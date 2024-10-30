<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormationDetail;

class FormationDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormationDetail::factory()
            ->count(5)
            ->create();
    }
}
