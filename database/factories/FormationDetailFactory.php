<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\FormationDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormationDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'url' => $this->faker->url(),
            'description' => $this->faker->sentence(15),
            'formation_id' => \App\Models\Formation::factory(),
        ];
    }
}
