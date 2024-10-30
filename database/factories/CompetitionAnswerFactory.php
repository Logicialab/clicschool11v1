<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CompetitionAnswer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionAnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompetitionAnswer::class;

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
            'competition_question_id' => \App\Models\CompetitionQuestion::factory(),
            'student_id' => \App\Models\Student::factory(),
        ];
    }
}
