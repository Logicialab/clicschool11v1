<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TeacherSalary;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherSalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TeacherSalary::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'montly_salary' => $this->faker->randomNumber(1),
            'paid_at' => $this->faker->date(),
            'status' => $this->faker->word(),
            'teacher_id' => \App\Models\Teacher::factory(),
        ];
    }
}
