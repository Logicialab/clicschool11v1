<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TeacherPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherPaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TeacherPayment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomNumber(1),
            'payment_date' => $this->faker->date(),
            'description' => $this->faker->sentence(15),
            'teacher_id' => \App\Models\Teacher::factory(),
        ];
    }
}
