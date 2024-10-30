<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionExerciceQcm;

class QuestionExerciceQcmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuestionExerciceQcm::factory()
            ->count(5)
            ->create();
    }
}
