<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MentalDisorder;
use App\Models\Question;
use App\Models\Rule;
use App\Models\Symptom;
use App\Models\AssessmentQuestion;

class MentalHealthSeeder extends Seeder
{
    public function run()
    {
        // Mental Disorders
        $disorders = [
            ['name' => 'Psikosomatik', 'description' => 'Gangguan mental dengan gejala fisik.'],
            ['name' => 'Kecemasan', 'description' => 'Perasaan cemas berlebihan.'],
            ['name' => 'PTSD', 'description' => 'Gangguan akibat trauma masa lalu.'],
            ['name' => 'Depresi', 'description' => 'Kondisi kesedihan yang berkepanjangan.'],
            ['name' => 'Psikosis', 'description' => 'Kehilangan kontak dengan kenyataan.'],
            ['name' => 'Skizofrenia', 'description' => 'Gangguan dengan gejala delusi atau halusinasi.'],
            ['name' => 'Bipolar', 'description' => 'Perubahan suasana hati yang drastis.'],
        ];

        foreach ($disorders as $disorder) {
            MentalDisorder::create($disorder);
        }

        // Symptoms
        $symptoms = [
            // Psikosomatik
            ['name' => 'Sakit kepala berulang', 'disorder' => 'Psikosomatik'],
            ['name' => 'Kelelahan kronis', 'disorder' => 'Psikosomatik'],
            ['name' => 'Nyeri otot tanpa sebab jelas', 'disorder' => 'Psikosomatik'],
            ['name' => 'Gangguan pencernaan', 'disorder' => 'Psikosomatik'],

            // Kecemasan
            ['name' => 'Kekhawatiran berlebihan', 'disorder' => 'Kecemasan'],
            ['name' => 'Serangan panik', 'disorder' => 'Kecemasan'],
            ['name' => 'Ketegangan otot', 'disorder' => 'Kecemasan'],
            ['name' => 'Sulit berkonsentrasi', 'disorder' => 'Kecemasan'],

            // PTSD
            ['name' => 'Kilas balik traumatis', 'disorder' => 'PTSD'],
            ['name' => 'Mimpi buruk', 'disorder' => 'PTSD'],
            ['name' => 'Menghindari situasi yang mengingatkan trauma', 'disorder' => 'PTSD'],
            ['name' => 'Reaksi berlebihan terhadap suara keras', 'disorder' => 'PTSD'],

            // Depresi
            ['name' => 'Perasaan sedih berkepanjangan', 'disorder' => 'Depresi'],
            ['name' => 'Kehilangan minat', 'disorder' => 'Depresi'],
            ['name' => 'Perubahan pola tidur', 'disorder' => 'Depresi'],
            ['name' => 'Pikiran tentang kematian', 'disorder' => 'Depresi'],

            // Psikosis
            ['name' => 'Halusinasi', 'disorder' => 'Psikosis'],
            ['name' => 'Delusi', 'disorder' => 'Psikosis'],
            ['name' => 'Pikiran tidak terorganisir', 'disorder' => 'Psikosis'],
            ['name' => 'Perilaku aneh', 'disorder' => 'Psikosis'],

            // Skizofrenia
            ['name' => 'Halusinasi persisten', 'disorder' => 'Skizofrenia'],
            ['name' => 'Delusi kompleks', 'disorder' => 'Skizofrenia'],
            ['name' => 'Penarikan sosial', 'disorder' => 'Skizofrenia'],
            ['name' => 'Penurunan fungsi sehari-hari', 'disorder' => 'Skizofrenia'],

            // Bipolar
            ['name' => 'Perubahan mood ekstrem', 'disorder' => 'Bipolar'],
            ['name' => 'Episode manik', 'disorder' => 'Bipolar'],
            ['name' => 'Episode depresi', 'disorder' => 'Bipolar'],
            ['name' => 'Perubahan pola tidur drastis', 'disorder' => 'Bipolar'],
        ];

        foreach ($symptoms as $symptom) {
            Symptom::create(['name' => $symptom['name']]);
        }

        // Questions
        $questions = [
            // Psikosomatik
            ['symptom_id' => 1, 'question_text' => 'Apakah Anda sering mengalami sakit kepala tanpa sebab yang jelas?', 'cf_expert' => 0.8],
            ['symptom_id' => 2, 'question_text' => 'Apakah Anda merasa lelah sepanjang waktu, bahkan setelah tidur cukup?', 'cf_expert' => 0.7],
            ['symptom_id' => 3, 'question_text' => 'Apakah Anda sering mengalami nyeri otot tanpa melakukan aktivitas fisik berlebihan?', 'cf_expert' => 0.75],
            ['symptom_id' => 4, 'question_text' => 'Apakah Anda sering mengalami masalah pencernaan seperti mual atau sakit perut tanpa sebab yang jelas?', 'cf_expert' => 0.7],

            // Kecemasan
            ['symptom_id' => 5, 'question_text' => 'Apakah Anda sering merasa cemas atau khawatir berlebihan tentang berbagai hal dalam hidup Anda?', 'cf_expert' => 0.9],
            ['symptom_id' => 6, 'question_text' => 'Apakah Anda pernah mengalami serangan panik yang tiba-tiba?', 'cf_expert' => 0.85],
            ['symptom_id' => 7, 'question_text' => 'Apakah Anda sering merasa tegang atau sulit untuk rileks?', 'cf_expert' => 0.8],
            ['symptom_id' => 8, 'question_text' => 'Apakah Anda mengalami kesulitan berkonsentrasi karena pikiran cemas?', 'cf_expert' => 0.75],

            // PTSD
            ['symptom_id' => 9, 'question_text' => 'Apakah Anda mengalami kilas balik atau ingatan yang mengganggu tentang pengalaman traumatis?', 'cf_expert' => 0.95],
            ['symptom_id' => 10, 'question_text' => 'Apakah Anda sering mengalami mimpi buruk tentang kejadian traumatis?', 'cf_expert' => 0.9],
            ['symptom_id' => 11, 'question_text' => 'Apakah Anda menghindari situasi atau tempat yang mengingatkan Anda pada pengalaman traumatis?', 'cf_expert' => 0.85],
            ['symptom_id' => 12, 'question_text' => 'Apakah Anda memiliki reaksi berlebihan terhadap suara keras atau gerakan tiba-tiba?', 'cf_expert' => 0.8],

            // Depresi
            ['symptom_id' => 13, 'question_text' => 'Apakah Anda merasa sedih atau tertekan hampir setiap hari selama lebih dari dua minggu?', 'cf_expert' => 0.9],
            ['symptom_id' => 14, 'question_text' => 'Apakah Anda kehilangan minat atau kesenangan dalam aktivitas yang biasanya Anda nikmati?', 'cf_expert' => 0.85],
            ['symptom_id' => 15, 'question_text' => 'Apakah Anda mengalami perubahan signifikan dalam pola tidur (sulit tidur atau tidur berlebihan)?', 'cf_expert' => 0.8],
            ['symptom_id' => 16, 'question_text' => 'Apakah Anda memiliki pikiran tentang kematian atau bunuh diri?', 'cf_expert' => 0.95],

            // Psikosis
            ['symptom_id' => 17, 'question_text' => 'Apakah Anda pernah melihat, mendengar, atau merasakan sesuatu yang orang lain tidak alami?', 'cf_expert' => 0.95],
            ['symptom_id' => 18, 'question_text' => 'Apakah Anda memiliki keyakinan kuat yang tidak masuk akal dan tidak dapat diubah oleh bukti?', 'cf_expert' => 0.9],
            ['symptom_id' => 19, 'question_text' => 'Apakah Anda merasa pikiran Anda kacau atau sulit untuk berpikir jernih?', 'cf_expert' => 0.85],
            ['symptom_id' => 20, 'question_text' => 'Apakah orang lain mengatakan bahwa perilaku Anda aneh atau tidak biasa?', 'cf_expert' => 0.8],

            // Skizofrenia
            ['symptom_id' => 21, 'question_text' => 'Apakah Anda sering mengalami halusinasi yang persisten (melihat, mendengar, atau merasakan sesuatu yang tidak ada)?', 'cf_expert' => 0.95],
            ['symptom_id' => 22, 'question_text' => 'Apakah Anda memiliki keyakinan aneh atau tidak masuk akal yang sangat kuat dan kompleks?', 'cf_expert' => 0.9],
            ['symptom_id' => 23, 'question_text' => 'Apakah Anda cenderung menarik diri dari interaksi sosial dan lebih suka menyendiri?', 'cf_expert' => 0.85],
            ['symptom_id' => 24, 'question_text' => 'Apakah Anda mengalami kesulitan dalam melakukan tugas sehari-hari seperti merawat diri atau bekerja?', 'cf_expert' => 0.8],

            // Bipolar
            ['symptom_id' => 25, 'question_text' => 'Apakah Anda mengalami perubahan suasana hati yang ekstrem, dari sangat gembira ke sangat sedih?', 'cf_expert' => 0.9],
            ['symptom_id' => 26, 'question_text' => 'Apakah Anda pernah mengalami periode di mana Anda merasa sangat energik, kurang tidur, dan memiliki banyak ide?', 'cf_expert' => 0.85],
            ['symptom_id' => 27, 'question_text' => 'Apakah Anda pernah mengalami periode depresi berat yang berlangsung beberapa hari atau minggu?', 'cf_expert' => 0.85],
            ['symptom_id' => 28, 'question_text' => 'Apakah pola tidur Anda berubah secara drastis, kadang sangat sedikit tidur dan kadang tidur berlebihan?', 'cf_expert' => 0.8],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }

        // Rules
        $rules = [
            ['mental_disorder_id' => 1, 'symptoms' => [1, 2, 3, 4], 'cf' => 0.7], // Psikosomatik
            ['mental_disorder_id' => 2, 'symptoms' => [5, 6, 7, 8], 'cf' => 0.8], // Kecemasan
            ['mental_disorder_id' => 3, 'symptoms' => [9, 10, 11, 12], 'cf' => 0.9], // PTSD
            ['mental_disorder_id' => 4, 'symptoms' => [13, 14, 15, 16], 'cf' => 0.85], // Depresi
            ['mental_disorder_id' => 5, 'symptoms' => [17, 18, 19, 20], 'cf' => 0.9], // Psikosis
            ['mental_disorder_id' => 6, 'symptoms' => [21, 22, 23, 24], 'cf' => 0.95], // Skizofrenia
            ['mental_disorder_id' => 7, 'symptoms' => [25, 26, 27, 28], 'cf' => 0.8], // Bipolar
        ];

        foreach ($rules as $rule) {
            Rule::create($rule);
        }

        $assessmentQuestions = [
            // Psikosomatik
            ['mental_disorder_id' => 1, 'question_text' => 'Apakah intensitas sakit kepala Anda berkurang dibandingkan sebelumnya?'],
            ['mental_disorder_id' => 1, 'question_text' => 'Apakah Anda merasa lebih berenergi sepanjang hari?'],
            ['mental_disorder_id' => 1, 'question_text' => 'Apakah nyeri otot yang Anda alami berkurang intensitasnya?'],
            ['mental_disorder_id' => 1, 'question_text' => 'Apakah masalah pencernaan Anda membaik?'],

            // Kecemasan
            ['mental_disorder_id' => 2, 'question_text' => 'Apakah Anda merasa lebih tenang dalam menghadapi situasi sehari-hari?'],
            ['mental_disorder_id' => 2, 'question_text' => 'Apakah frekuensi serangan panik Anda berkurang?'],
            ['mental_disorder_id' => 2, 'question_text' => 'Apakah Anda merasa lebih rileks secara fisik?'],
            ['mental_disorder_id' => 2, 'question_text' => 'Apakah Anda dapat berkonsentrasi lebih baik sekarang?'],

            // PTSD
            ['mental_disorder_id' => 3, 'question_text' => 'Apakah frekuensi kilas balik traumatis Anda berkurang?'],
            ['mental_disorder_id' => 3, 'question_text' => 'Apakah Anda mengalami penurunan dalam frekuensi atau intensitas mimpi buruk?'],
            ['mental_disorder_id' => 3, 'question_text' => 'Apakah Anda merasa lebih nyaman menghadapi situasi yang sebelumnya mengingatkan Anda pada trauma?'],
            ['mental_disorder_id' => 3, 'question_text' => 'Apakah reaksi Anda terhadap suara keras atau gerakan tiba-tiba menjadi lebih terkendali?'],

            // Depresi
            ['mental_disorder_id' => 4, 'question_text' => 'Apakah Anda merasa suasana hati Anda membaik secara keseluruhan?'],
            ['mental_disorder_id' => 4, 'question_text' => 'Apakah Anda mulai menemukan kembali kesenangan dalam aktivitas yang dulu Anda nikmati?'],
            ['mental_disorder_id' => 4, 'question_text' => 'Apakah pola tidur Anda menjadi lebih teratur?'],
            ['mental_disorder_id' => 4, 'question_text' => 'Apakah pikiran tentang kematian atau bunuh diri berkurang?'],

            // Psikosis
            ['mental_disorder_id' => 5, 'question_text' => 'Apakah frekuensi atau intensitas halusinasi Anda berkurang?'],
            ['mental_disorder_id' => 5, 'question_text' => 'Apakah Anda merasa keyakinan yang tidak masuk akal mulai berkurang?'],
            ['mental_disorder_id' => 5, 'question_text' => 'Apakah Anda merasa pikiran Anda menjadi lebih terorganisir?'],
            ['mental_disorder_id' => 5, 'question_text' => 'Apakah orang di sekitar Anda mengatakan bahwa perilaku Anda menjadi lebih normal?'],

            // Skizofrenia
            ['mental_disorder_id' => 6, 'question_text' => 'Apakah halusinasi yang Anda alami menjadi kurang intens atau kurang sering?'],
            ['mental_disorder_id' => 6, 'question_text' => 'Apakah Anda merasa keyakinan aneh Anda mulai berkurang?'],
            ['mental_disorder_id' => 6, 'question_text' => 'Apakah Anda merasa lebih nyaman berinteraksi dengan orang lain?'],
            ['mental_disorder_id' => 6, 'question_text' => 'Apakah Anda merasa lebih mampu menjalankan tugas sehari-hari?'],

            // Bipolar
            ['mental_disorder_id' => 7, 'question_text' => 'Apakah perubahan suasana hati Anda menjadi kurang ekstrem?'],
            ['mental_disorder_id' => 7, 'question_text' => 'Apakah Anda mengalami penurunan dalam frekuensi atau intensitas episode manik?'],
            ['mental_disorder_id' => 7, 'question_text' => 'Apakah periode depresi yang Anda alami menjadi kurang intens atau lebih singkat?'],
            ['mental_disorder_id' => 7, 'question_text' => 'Apakah pola tidur Anda menjadi lebih stabil?'],
        ];

        foreach ($assessmentQuestions as $question) {
            AssessmentQuestion::firstOrCreate($question);
        }
    }
}
