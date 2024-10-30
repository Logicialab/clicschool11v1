<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionQuizQcm;

class QuestionQuizQcmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuestionQuizQcm::factory()
            ->count(5)
            ->create();
    }
}
