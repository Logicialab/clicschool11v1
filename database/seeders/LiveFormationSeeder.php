<?php

namespace Database\Seeders;

use App\Models\LiveFormation;
use Illuminate\Database\Seeder;

class LiveFormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LiveFormation::factory()
            ->count(5)
            ->create();
    }
}
