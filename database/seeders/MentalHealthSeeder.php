<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MentalDisorder;
use App\Models\Question;

class MentalHealthSeeder extends Seeder
{
    public function run()
    {
        $disorders = [
            ['name' => 'Depresi Ringan', 'description' => 'Gejala depresi yang bersifat ringan.'],
            ['name' => 'Depresi Sedang', 'description' => 'Gejala depresi yang bersifat sedang.'],
            ['name' => 'Depresi Berat', 'description' => 'Gejala depresi yang bersifat berat.'],
        ];

        foreach ($disorders as $disorder) {
            MentalDisorder::create($disorder);
        }

        $questions = [
            'Apakah Anda sering merasa sedih atau murung?',
            'Apakah Anda kehilangan minat pada aktivitas yang biasanya Anda nikmati?',
            'Apakah Anda mengalami kesulitan tidur atau tidur berlebihan?',
            'Apakah Anda merasa lelah atau kurang berenergi?',
            'Apakah Anda mengalami nafsu makan yang buruk atau makan berlebihan?',
            'Apakah Anda merasa buruk tentang diri sendiri atau merasa seperti orang yang gagal?',
            'Apakah Anda mengalami kesulitan berkonsentrasi?',
            'Apakah Anda bergerak atau berbicara sangat lambat sehingga orang lain memperhatikannya?',
            'Apakah Anda memiliki pikiran untuk menyakiti diri sendiri?',
            'Apakah masalah-masalah ini membuat Anda sulit melakukan pekerjaan atau bergaul dengan orang lain?',
        ];

        foreach ($questions as $questionText) {
            Question::create([
                'mental_disorder_id' => MentalDisorder::inRandomOrder()->first()->id,
                'question_text' => $questionText,
            ]);
        }
    }
}
