<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'question_text' => 'Apakah Anda keberatan dengan teman yang merokok?',
                'option_1' => 'Sangat Keberatan',
                'option_2' => 'Keberatan',
                'option_3' => 'Lumayan Keberatan',
                'option_4' => 'Tidak Keberatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question_text' => 'Seberapa sering Anda berolahraga dalam seminggu?',
                'option_1' => 'Tidak pernah',
                'option_2' => '1-2 kali',
                'option_3' => '3-5 kali',
                'option_4' => 'Setiap hari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question_text' => 'Tingkat toleransi Anda terhadap kebisingan di lingkungan sekitar?',
                'option_1' => 'Sangat Sensitif',
                'option_2' => 'Sensitif',
                'option_3' => 'Biasa Saja',
                'option_4' => 'Tidak Sensitif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
