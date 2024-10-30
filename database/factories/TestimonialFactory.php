<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimonial::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'specialite' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'active' => $this->faker->boolean(),
            'ip' => $this->faker->ipv4(),
            'image' => $this->faker->image('public/storage/imagefaker', 640, 480, null, false),
        ];
    }
}
