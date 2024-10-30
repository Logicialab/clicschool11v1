<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\StudentAnswerQuestionExerciceQcm;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentAnswerQuestionExerciceQcmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentAnswerQuestionExerciceQcm::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reponse' => $this->faker->text(),
            'is_correct' => $this->faker->boolean(),
            'question_exercice_qcm_id' => \App\Models\QuestionExerciceQcm::factory(),
            'student_id' => \App\Models\Student::factory(),
        ];
    }
}
