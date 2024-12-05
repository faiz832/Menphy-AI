<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MentalDisorder;
use App\Models\Question;
use App\Models\Rule;

class MentalHealthSeeder extends Seeder
{
    public function run()
    {
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

        $questions = [
            // Psikosomatik
            ['mental_disorder_id' => 1, 'question_text' => 'Apakah Anda sering merasa sakit fisik tanpa penyebab medis yang jelas?'],
            ['mental_disorder_id' => 1, 'question_text' => 'Apakah stres sering membuat tubuh Anda terasa sakit?'],
            ['mental_disorder_id' => 1, 'question_text' => 'Apakah Anda sering mengalami gangguan pencernaan saat merasa cemas?'],
            ['mental_disorder_id' => 1, 'question_text' => 'Apakah Anda sering merasa lelah tanpa alasan yang jelas?'],

            // Kecemasan
            ['mental_disorder_id' => 2, 'question_text' => 'Apakah Anda sering merasa khawatir berlebihan terhadap situasi sehari-hari?'],
            ['mental_disorder_id' => 2, 'question_text' => 'Apakah Anda sulit tidur karena terlalu banyak berpikir?'],
            ['mental_disorder_id' => 2, 'question_text' => 'Apakah Anda sering merasa tegang atau gelisah dalam lingkungan sosial?'],
            ['mental_disorder_id' => 2, 'question_text' => 'Apakah Anda sering merasa jantung berdebar-debar tanpa sebab yang jelas?'],

            // PTSD
            ['mental_disorder_id' => 3, 'question_text' => 'Apakah Anda sering menghindari situasi yang mengingatkan pada peristiwa traumatis?'],
            ['mental_disorder_id' => 3, 'question_text' => 'Apakah Anda mengalami kilas balik (flashback) terhadap peristiwa traumatis?'],
            ['mental_disorder_id' => 3, 'question_text' => 'Apakah Anda sering mengalami mimpi buruk tentang peristiwa traumatis?'],
            ['mental_disorder_id' => 3, 'question_text' => 'Apakah Anda merasa mudah terkejut atau cemas secara berlebihan?'],

            // Depresi
            ['mental_disorder_id' => 4, 'question_text' => 'Apakah Anda merasa sedih atau kosong hampir setiap hari?'],
            ['mental_disorder_id' => 4, 'question_text' => 'Apakah Anda kehilangan minat pada aktivitas yang biasanya Anda nikmati?'],
            ['mental_disorder_id' => 4, 'question_text' => 'Apakah Anda merasa kelelahan sepanjang waktu meskipun tidak melakukan banyak aktivitas?'],
            ['mental_disorder_id' => 4, 'question_text' => 'Apakah Anda sering merasa tidak berharga atau bersalah secara berlebihan?'],

            // Psikosis
            ['mental_disorder_id' => 5, 'question_text' => 'Apakah Anda pernah mendengar suara yang tidak didengar orang lain?'],
            ['mental_disorder_id' => 5, 'question_text' => 'Apakah Anda merasa orang lain mencoba mengendalikan pikiran Anda?'],
            ['mental_disorder_id' => 5, 'question_text' => 'Apakah Anda merasa sulit membedakan antara kenyataan dan imajinasi?'],
            ['mental_disorder_id' => 5, 'question_text' => 'Apakah Anda pernah melihat sesuatu yang tidak nyata?'],

            // Skizofrenia
            ['mental_disorder_id' => 6, 'question_text' => 'Apakah Anda merasa terisolasi dari keluarga atau teman?'],
            ['mental_disorder_id' => 6, 'question_text' => 'Apakah Anda merasa sulit untuk mengekspresikan emosi?'],
            ['mental_disorder_id' => 6, 'question_text' => 'Apakah Anda sering memiliki pikiran yang tidak logis atau tidak teratur?'],
            ['mental_disorder_id' => 6, 'question_text' => 'Apakah Anda merasa ada orang lain yang mencoba mencelakai Anda tanpa sebab jelas?'],

            // Bipolar
            ['mental_disorder_id' => 7, 'question_text' => 'Apakah Anda sering mengalami perubahan suasana hati yang ekstrim?'],
            ['mental_disorder_id' => 7, 'question_text' => 'Apakah Anda pernah merasa sangat energik dan tidak membutuhkan tidur?'],
            ['mental_disorder_id' => 7, 'question_text' => 'Apakah Anda pernah merasa sangat sedih atau putus asa tanpa alasan jelas?'],
            ['mental_disorder_id' => 7, 'question_text' => 'Apakah Anda pernah memiliki periode di mana Anda merasa sangat percaya diri secara berlebihan?'],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }

        $rules = [
            // Psikosomatik
            ['mental_disorder_id' => 1, 'condition' => 'Q1:yes && Q2:yes && Q3:yes', 'cf' => 0.9],
            ['mental_disorder_id' => 1, 'condition' => 'Q1:yes && Q4:yes', 'cf' => 0.7],

            // Kecemasan
            ['mental_disorder_id' => 2, 'condition' => 'Q5:yes && Q6:yes && Q7:yes', 'cf' => 0.8],
            ['mental_disorder_id' => 2, 'condition' => 'Q6:yes && Q8:yes', 'cf' => 0.7],

            // PTSD
            ['mental_disorder_id' => 3, 'condition' => 'Q9:yes && Q10:yes && Q11:yes', 'cf' => 0.9],
            ['mental_disorder_id' => 3, 'condition' => 'Q12:yes && Q10:yes', 'cf' => 0.7],

            // Depresi
            ['mental_disorder_id' => 4, 'condition' => 'Q13:yes && Q14:yes && Q15:yes', 'cf' => 0.9],
            ['mental_disorder_id' => 4, 'condition' => 'Q13:yes && Q16:yes', 'cf' => 0.8],

            // Psikosis
            ['mental_disorder_id' => 5, 'condition' => 'Q17:yes && Q18:yes && Q19:yes', 'cf' => 0.9],
            ['mental_disorder_id' => 5, 'condition' => 'Q20:yes && Q18:yes', 'cf' => 0.7],

            // Skizofrenia
            ['mental_disorder_id' => 6, 'condition' => 'Q21:yes && Q22:yes && Q23:yes', 'cf' => 0.8],
            ['mental_disorder_id' => 6, 'condition' => 'Q24:yes && Q23:yes', 'cf' => 0.7],

            // Bipolar
            ['mental_disorder_id' => 7, 'condition' => 'Q25:yes && Q26:yes && Q27:yes', 'cf' => 0.9],
            ['mental_disorder_id' => 7, 'condition' => 'Q28:yes && Q26:yes', 'cf' => 0.7],
        ];

        foreach ($rules as $rule) {
            Rule::create($rule);
        }
    }
}
