<?php

namespace Database\Seeders;

use App\Models\ExerciceQcm;
use Illuminate\Database\Seeder;

class ExerciceQcmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExerciceQcm::factory()
            ->count(5)
            ->create();
    }
}
