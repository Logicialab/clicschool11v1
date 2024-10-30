<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\LiveFormation;
use Illuminate\Database\Eloquent\Factories\Factory;

class LiveFormationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LiveFormation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'url' => $this->faker->url(),
            'duration' => $this->faker->text(255),
            'scheduled_at' => $this->faker->dateTime(),
            'active' => $this->faker->boolean(),
            'slug' => $this->faker->unique->slug(),
            'teacher_id' => \App\Models\Teacher::factory(),
            'image' => $this->faker->image('public/storage/imagefaker', 640, 480, null, false),
        ];
    }
}
