<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Support\Str;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'slug' => $this->faker->unique->slug(),
            'description' => $this->faker->sentence(15),
            'body' => $this->faker->text(),
            'order' => $this->faker->randomNumber(0),
            'active' => $this->faker->boolean(),
            'teacher_id' => Teacher::factory(),
            'unitCourse_id' => \App\Models\UnitCourse::factory(),
            'image' => $this->faker->image('public/storage/imagefaker', 640, 480, null, false),
        ];
    }
}
