<?php

namespace Database\Factories;

use App\Models\Exercice;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'slug' => $this->faker->unique->slug(),
            'active' => $this->faker->boolean(),
            'order' => $this->faker->randomNumber(0),
            'solution' => $this->faker->text(255),
            'file_solution' => $this->faker->text(255),
            'active_solution' => $this->faker->boolean(),
            'course_id' => \App\Models\Course::factory(),
        ];
    }
}
