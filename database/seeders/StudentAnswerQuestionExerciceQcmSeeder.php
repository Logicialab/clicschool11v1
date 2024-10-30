<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentAnswerQuestionExerciceQcm;

class StudentAnswerQuestionExerciceQcmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentAnswerQuestionExerciceQcm::factory()
            ->count(5)
            ->create();
    }
}
