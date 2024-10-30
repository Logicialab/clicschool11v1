<?php

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Formation::class;

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
            'status' => $this->faker->word(),
            'active' => $this->faker->boolean(),
            'slug' => $this->faker->unique->slug(),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'formation_type_id' => \App\Models\FormationType::factory(),
            'teacher_id' => \App\Models\Teacher::factory(),
            'image' => $this->faker->image('public/storage/imagefaker', 640, 480, null, false),
        ];
    }
}
