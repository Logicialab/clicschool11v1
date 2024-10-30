<?php

namespace Database\Factories;

use App\Models\QuizQcm;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizQcmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuizQcm::class;

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
            'active' => $this->faker->boolean(),
            'slug' => $this->faker->unique->slug(),
            'order' => $this->faker->randomNumber(0),
            'course_id' => \App\Models\Course::factory(),
        ];
    }
}
