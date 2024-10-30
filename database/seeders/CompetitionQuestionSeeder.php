<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetitionQuestion;

class CompetitionQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompetitionQuestion::factory()
            ->count(5)
            ->create();
    }
}
