<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentAnswerQuizQcm;

class StudentAnswerQuizQcmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentAnswerQuizQcm::factory()
            ->count(5)
            ->create();
    }
}
