<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\QuestionExerciceQcm;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionExerciceQcmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuestionExerciceQcm::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'type' => $this->faker->word(),
            'description' => $this->faker->sentence(15),
            'q1' => $this->faker->text(255),
            'q2' => $this->faker->text(255),
            'q3' => $this->faker->text(255),
            'q4' => $this->faker->text(255),
            'answer' => $this->faker->text(255),
            'exercice_qcm_id' => \App\Models\ExerciceQcm::factory(),
        ];
    }
}
