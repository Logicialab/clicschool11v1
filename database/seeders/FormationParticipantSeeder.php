<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormationParticipant;

class FormationParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormationParticipant::factory()
            ->count(5)
            ->create();
    }
}
