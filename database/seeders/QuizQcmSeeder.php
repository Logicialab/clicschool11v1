<?php

namespace Database\Seeders;

use App\Models\QuizQcm;
use Illuminate\Database\Seeder;

class QuizQcmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuizQcm::factory()
            ->count(5)
            ->create();
    }
}
