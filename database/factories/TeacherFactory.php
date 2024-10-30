<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'nickname' => $this->faker->lastName(),
            'bio' => $this->faker->sentence(15),
            'salaire' => $this->faker->randomNumber(1),
            'slug' => $this->faker->unique->slug(),
            'school_name' => $this->faker->text(255),
            'specialite' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
            'image' => $this->faker->image('public/storage/imagefaker', 640, 480, null, false),
        ];
    }
}
