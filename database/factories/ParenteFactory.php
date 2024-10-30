<?php

namespace Database\Factories;

use App\Models\Parente;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parente::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'nickname' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
