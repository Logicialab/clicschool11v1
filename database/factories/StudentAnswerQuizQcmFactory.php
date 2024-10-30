<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\StudentAnswerQuizQcm;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentAnswerQuizQcmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentAnswerQuizQcm::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->text(),
            'is_correct' => $this->faker->boolean(),
            'student_id' => \App\Models\Student::factory(),
            'questionQuizQcm_id' => \App\Models\QuestionQuizQcm::factory(),
        ];
    }
}
