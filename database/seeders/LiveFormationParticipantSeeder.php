<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LiveFormationParticipant;

class LiveFormationParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LiveFormationParticipant::factory()
            ->count(5)
            ->create();
    }
}
