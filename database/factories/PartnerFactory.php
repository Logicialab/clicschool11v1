<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partner::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'active' => $this->faker->boolean(),
            'description' => $this->faker->sentence(15),
            'content' => $this->faker->text(),
            'url' => $this->faker->url(),
            'image' => $this->faker->image('public/storage/imagefaker', 640, 480, null, false),
        ];
    }
}
