<?php

namespace Database\Factories;

use App\Models\LiveCourse;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LiveCourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LiveCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => $this->faker->url(),
            'scheduled_at' => $this->faker->dateTime(),
            'duration' => $this->faker->randomNumber(0),
            'active' => $this->faker->boolean(),
            'course_id' => \App\Models\Course::factory(),
            'teacher_id' => \App\Models\Teacher::factory(),
        ];
    }
}
