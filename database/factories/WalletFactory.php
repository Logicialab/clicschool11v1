<?php

namespace Database\Factories;

use App\Models\Wallet;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wallet::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'balance' => $this->faker->randomNumber(1),
            'description' => $this->faker->sentence(15),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
