<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExerciceStudent;

class ExerciceStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExerciceStudent::factory()
            ->count(5)
            ->create();
    }
}
