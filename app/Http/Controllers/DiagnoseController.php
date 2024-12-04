<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\MentalDisorder;
use App\Models\Question;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DiagnoseController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('front.diagnose', compact('questions'));
    }

    public function submit(Request $request)
    {
        $answers = $request->input('answers');
        $positiveAnswers = array_filter($answers, function ($answer) {
            return $answer === 'yes';
        });

        $mentalDisorder = $this->determineMentalDisorder(count($positiveAnswers));

        if (!$mentalDisorder) {
            return back()->with('error', 'Tidak dapat menentukan gangguan mental. Silakan coba lagi.');
        }

        $diagnosis = Diagnosis::create([
            'user_id' => Auth::id(),
            'mental_disorder_id' => $mentalDisorder->id,
            'diagnosis_date' => now(),
        ]);

        $recommendation = $this->generateRecommendation($diagnosis);

        return redirect()->route('diagnosis.result', ['id' => $diagnosis->id]);
    }

    public function showResult($id)
    {
        $diagnosis = Diagnosis::with(['mentalDisorder', 'recommendation'])->findOrFail($id);
        return view('front.diagnosis-result', compact('diagnosis'));
    }

    private function determineMentalDisorder($positiveAnswersCount)
    {
        if ($positiveAnswersCount > 7) {
            $disorder = MentalDisorder::where('name', 'Depresi Berat')->first();
        } elseif ($positiveAnswersCount > 4) {
            $disorder = MentalDisorder::where('name', 'Depresi Sedang')->first();
        } else {
            $disorder = MentalDisorder::where('name', 'Depresi Ringan')->first();
        }

        if (!$disorder) {
            $disorder = MentalDisorder::first(); // Fallback to the first available disorder
        }

        if (!$disorder) {
            throw new \Exception("Tidak ada gangguan mental yang tersedia dalam sistem.");
        }

        return $disorder;
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
