<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ExerciceStudent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciceStudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExerciceStudent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->text(),
            'is_correct' => $this->faker->boolean(),
            'exercice_id' => \App\Models\Exercice::factory(),
            'student_id' => \App\Models\Student::factory(),
        ];
    }
}
