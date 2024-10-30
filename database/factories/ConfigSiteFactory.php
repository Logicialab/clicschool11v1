<?php

namespace Database\Factories;

use App\Models\ConfigSite;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigSiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConfigSite::class;

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
            'active' => $this->faker->boolean(),
            'url' => $this->faker->url(),
            'key' => $this->faker->unique->text(255),
            'image' => $this->faker->image('public/storage/imagefaker', 640, 480, null, false),
        ];
    }
}
