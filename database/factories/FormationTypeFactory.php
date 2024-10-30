<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\FormationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormationType::class;

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
        ];
    }
}
