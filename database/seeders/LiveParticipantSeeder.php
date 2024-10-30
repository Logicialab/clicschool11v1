<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LiveParticipant;

class LiveParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LiveParticipant::factory()
            ->count(5)
            ->create();
    }
}
