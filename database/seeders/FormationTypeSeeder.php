<?php

namespace Database\Seeders;

use App\Models\FormationType;
use Illuminate\Database\Seeder;

class FormationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormationType::factory()
            ->count(5)
            ->create();
    }
}
