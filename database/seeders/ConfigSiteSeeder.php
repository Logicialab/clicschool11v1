<?php

namespace Database\Seeders;

use App\Models\ConfigSite;
use Illuminate\Database\Seeder;

class ConfigSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConfigSite::factory()
            ->count(5)
            ->create();
    }
}
