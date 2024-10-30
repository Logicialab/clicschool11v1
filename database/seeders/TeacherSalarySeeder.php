<?php

namespace Database\Seeders;

use App\Models\TeacherSalary;
use Illuminate\Database\Seeder;

class TeacherSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeacherSalary::factory()
            ->count(5)
            ->create();
    }
}
