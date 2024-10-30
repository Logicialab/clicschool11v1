<?php

namespace Database\Factories;

use App\Models\Competition;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Competition::class;

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
            'date_start' => $this->faker->date(),
            'date_end' => $this->faker->date(),
            'active' => $this->faker->boolean(),
            'slug' => $this->faker->unique->slug(),
            'order' => $this->faker->randomNumber(0),
            'classe_id' => \App\Models\Classe::factory(),
        ];
    }
}
