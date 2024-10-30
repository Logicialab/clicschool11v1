<?php

namespace Database\Seeders;

use App\Models\ParentStudent;
use Illuminate\Database\Seeder;

class ParentStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParentStudent::factory()
            ->count(5)
            ->create();
    }
}
