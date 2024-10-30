<?php

namespace Database\Seeders;

use App\Models\LiveCourse;
use Illuminate\Database\Seeder;

class LiveCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LiveCourse::factory()
            ->count(5)
            ->create();
    }
}
