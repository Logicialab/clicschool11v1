<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetitionAnswer;

class CompetitionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompetitionAnswer::factory()
            ->count(5)
            ->create();
    }
}
