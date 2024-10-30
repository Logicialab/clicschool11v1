<?php

namespace Database\Seeders;

use App\Models\TeacherPayment;
use Illuminate\Database\Seeder;

class TeacherPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeacherPayment::factory()
            ->count(5)
            ->create();
    }
}
