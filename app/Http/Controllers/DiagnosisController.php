<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\MentalDisorder;
use App\Models\Question;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use PDF;

class DiagnosisController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('front.diagnosis', compact('questions'));
    }

    public function process(Request $request)
    {
        $answers = $request->input('answers');

        // Check if all answers are 'never'
        $allNever = count(array_filter($answers, fn($answer) => $answer === 'never')) === count($answers);

        if ($allNever) {
            $diagnosis = Diagnosis::create([
                'user_id' => Auth::user()->id,
                'mental_disorder_id' => null,
                'cf' => 100, // Set CF to 100 for no mental disorder
            ]);

            $this->generateRecommendation($diagnosis, true);
            return redirect()->route('front.diagnosis.result', $diagnosis->id);
        }

        $mentalDisorders = MentalDisorder::with('rules')->get();
        $results = [];

        foreach ($mentalDisorders as $disorder) {
            $cfCombine = $this->calculateCFCombine($disorder, $answers);
            $results[] = [
                'mental_disorder' => $disorder->name,
                'cf' => $cfCombine,
            ];
        }

        usort($results, fn($a, $b) => $b['cf'] <=> $a['cf']);

        // Only consider disorders with positive CF
        $highestCF = $results[0]['cf'];
        if ($highestCF <= 0) {
            $diagnosis = Diagnosis::create([
                'user_id' => Auth::user()->id,
                'mental_disorder_id' => null,
                'cf' => 0,
            ]);
        } else {
            $diagnosis = Diagnosis::create([
                'user_id' => Auth::user()->id,
                'mental_disorder_id' => MentalDisorder::where('name', $results[0]['mental_disorder'])->first()->id,
                'cf' => $highestCF,
            ]);
        }

        $this->generateRecommendation($diagnosis, $highestCF <= 0);
        return redirect()->route('front.diagnosis.result', $diagnosis->id);
    }

    private function calculateCFCombine($disorder, $answers)
    {
        $cfCombine = 0;
        $hasPositiveRule = false;

        foreach ($disorder->rules as $rule) {
            $cfRule = $this->calculateCFRule($rule, $answers);
            if ($cfRule > 0) {
                $hasPositiveRule = true;
                $cfCombine = $cfCombine + $cfRule * (1 - $cfCombine);
            }
        }

        // If no positive rules found, return 0 instead of negative value
        if (!$hasPositiveRule) {
            return 0;
        }

        // Ensure CF is between 0 and 100
        return max(0, min(100, $cfCombine * 100));
    }

    private function calculateCFRule($rule, $answers)
    {
        $cfValues = [];
        $totalAnswered = 0;
        $requiredSymptoms = count($rule->symptoms);

        foreach ($rule->symptoms as $symptomId) {
            $question = Question::where('symptom_id', $symptomId)->first();
            if (isset($answers[$question->id])) {
                $totalAnswered++;
                $cfUser = $this->getCfUser($question, $answers[$question->id]);
                $cfValues[] = $question->cf_expert * $cfUser;
            }
        }

        // If not all symptoms are answered, return 0
        if ($totalAnswered < $requiredSymptoms) {
            return 0;
        }

        if (empty($cfValues)) {
            return 0;
        }

        // Calculate combined CF for the rule
        $cfCombine = $cfValues[0];
        for ($i = 1; $i < count($cfValues); $i++) {
            $cfCombine = $cfCombine + $cfValues[$i] * (1 - $cfCombine);
        }

        // Ensure the result is between 0 and 1
        return max(0, min(1, $cfCombine));
    }

    private function getCfUser($question, $answer)
    {
        switch ($answer) {
            case 'never':
                return $question->cf_never;
            case 'rarely':
                return $question->cf_rarely;
            case 'sometimes':
                return $question->cf_sometimes;
            case 'often':
                return $question->cf_often;
            case 'very_often':
                return $question->cf_very_often;
            default:
                return 0;
        }
    }

    public function showResult($id)
    {
        $diagnosis = Diagnosis::with(['mentalDisorder', 'recommendation'])->findOrFail($id);

        if ($diagnosis->user_id !== Auth::user()->id) {
            return view('errors.forbidden')->with('message', 'You do not have permission to access this page.');
        }

        return view('front.diagnosis-result', compact('diagnosis'));
    }

    private function generateRecommendation($diagnosis, $isNoDisorder = false)
    {
        try {
            if ($isNoDisorder) {
                $prompt = "You are a professional psychologist or psychiatrist. The user has answered 'never' to all mental health screening questions. Please provide a brief, encouraging message about maintaining good mental health. 
                Note: Use paragraph formatting without bullet points or other formatting.
                Please keep the recommendations short and concise.
                Do not provide any additional information except for the recommended therapy.
                Formatted results must use Indonesian language and if possible, use language that is easily understood by ordinary people.
                Use everyday language and the pronouns 'aku' and 'kamu', as you are addressing teenagers. ";
            } else {
                $prompt = "You are a professional psychologist or psychiatrist. I have a mental health problem, namely, {$diagnosis->mentalDisorder->name}. Please give me personalized recommendations for healing therapies to improve my mental health.
                Note: Use paragraph formatting without bullet points or other formatting. 
                Please keep the recommendations short and concise. 
                Do not provide any additional information except for the recommended therapies.
                Formatted results must use Indonesian language and if possible, use language that is easily understood by ordinary people.
                use everyday language and use the pronouns 'aku' and 'kamu', because you are dealing with teenagers.";
            }

            $requestBody = [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $prompt
                            ]
                        ]
                    ]
                ]
            ];

            $apiKey = config('services.google.api_key');
            if (empty($apiKey)) {
                throw new \Exception('API key Gemini tidak ditemukan.');
            }

            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro-latest:generateContent?key={$apiKey}", $requestBody);

            if ($response->failed()) {
                throw new \Exception('Gagal menghubungi API Gemini: ' . $response->body());
            }

            $data = $response->json();

            if (!isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                throw new \Exception('Format respons API Gemini tidak sesuai yang diharapkan.');
            }

            $resultText = $data['candidates'][0]['content']['parts'][0]['text'];

            return Recommendation::create([
                'diagnosis_id' => $diagnosis->id,
                'recommendation_text' => $resultText,
            ]);
        } catch (\Exception $e) {
            return Recommendation::create([
                'diagnosis_id' => $diagnosis->id,
                'recommendation_text' => "Maaf, kami mengalami kesulitan dalam menghasilkan rekomendasi yang dipersonalisasi. 
                                      Silakan konsultasikan hasil diagnosis Anda dengan profesional kesehatan mental. 
                                      Sementara itu, cobalah untuk melakukan aktivitas relaksasi seperti meditasi atau 
                                      olahraga ringan untuk membantu mengelola gejala Anda."
            ]);
        }
    }

    public function exportPDF(Diagnosis $diagnosis)
    {
        if ($diagnosis->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $pdf = PDF::loadView('pdf.diagnosis', ['diagnosis' => $diagnosis]);
    
        $disorderName = $diagnosis->mentalDisorder 
            ? Str::slug($diagnosis->mentalDisorder->name) 
            : 'no-specific-disorder';
    
        $fileName = "diagnosis_report_{$disorderName}.pdf";
    
        return $pdf->download($fileName);
    }
}

