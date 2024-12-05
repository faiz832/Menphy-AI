<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\MentalDisorder;
use App\Models\Question;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DiagnosisController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('diagnosis.index', compact('questions'));
    }

    public function process(Request $request)
    {
        $answers = $request->input('answers'); // Format: ['Q1' => 'yes', 'Q2' => 'no', ...]
        $mentalDisorders = MentalDisorder::with('rules')->get();

        $results = [];
        foreach ($mentalDisorders as $disorder) {
            $cfTotal = 0;
            foreach ($disorder->rules as $rule) {
                $conditions = explode(' && ', $rule->condition);
                $ruleSatisfied = true;
                foreach ($conditions as $condition) {
                    [$questionCode, $expectedAnswer] = explode(':', $condition);
                    if (!isset($answers[$questionCode]) || $answers[$questionCode] !== $expectedAnswer) {
                        $ruleSatisfied = false;
                        break;
                    }
                }
                if ($ruleSatisfied) {
                    // Menggunakan rumus akumulasi CF
                    $cfTotal = $cfTotal + $rule->cf * (1 - $cfTotal);
                }
            }
            $results[] = [
                'mental_disorder' => $disorder->name,
                'cf' => round($cfTotal * 100, 2) // Convert to percentage
            ];
        }

        usort($results, fn($a, $b) => $b['cf'] <=> $a['cf']);

        // Simpan hasil ke database
        $diagnosis = Diagnosis::create([
            'user_id' => Auth::user()->id,
            'mental_disorder_id' => MentalDisorder::where('name', $results[0]['mental_disorder'])->first()->id,
            'cf' => $results[0]['cf'],
            'diagnosis_date' => now(),
        ]);

        // Generate rekomendasi
        $this->generateRecommendation($diagnosis);

        return redirect()->route('diagnosis.result', $diagnosis->id);
    }

    public function showResult($id)
    {
        $diagnosis = Diagnosis::with(['mentalDisorder'])->findOrFail($id);
        return view('diagnosis.result', compact('diagnosis'));
    }

    private function generateRecommendation($diagnosis)
    {
        try {
            $prompt = "You are a professional psychologist or psychiatrist. I have a mental health problem, namely, {$diagnosis->mentalDisorder->name}. Please give me personalized recommendations for healing therapies to improve my mental health.
            Note: Use paragraph formatting without bullet points or other formatting. 
            Please keep the recommendations short and concise. 
            Do not provide any additional information except for the recommended therapies.
            Formatted results must use Indonesian language and if possible, use language that is easily understood by ordinary people.
            use everyday language and use the pronouns 'aku' and 'kamu', because you are dealing with teenagers.";

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
}
