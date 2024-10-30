<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\UnitCourse;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitCourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UnitCourse::class;

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
            'slug' => $this->faker->unique->slug(),
            'classe_id' => \App\Models\Classe::factory(),
            'subject_id' => \App\Models\Subject::factory(),
            'level_id' => Level::factory(),
            'image' => $this->faker->image('public/storage/imagefaker', 640, 480, null, false),
        ];
    }
}
