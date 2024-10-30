<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CompetitionQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompetitionQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => $this->faker->text(255),
            'question_type' => $this->faker->text(255),
            'competition_id' => \App\Models\Competition::factory(),
        ];
    }
}
