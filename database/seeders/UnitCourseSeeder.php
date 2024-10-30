<?php

namespace Database\Seeders;

use App\Models\UnitCourse;
use Illuminate\Database\Seeder;

class UnitCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitCourse::factory()
            ->count(5)
            ->create();
    }
}
