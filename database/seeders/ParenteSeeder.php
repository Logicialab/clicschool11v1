<?php

namespace Database\Seeders;

use App\Models\Parente;
use Illuminate\Database\Seeder;

class ParenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Parente::factory()
            ->count(5)
            ->create();
    }
}
