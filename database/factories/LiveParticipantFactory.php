<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\LiveParticipant;
use Illuminate\Database\Eloquent\Factories\Factory;

class LiveParticipantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LiveParticipant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => \App\Models\Student::factory(),
            'liveCourse_id' => \App\Models\LiveCourse::factory(),
        ];
    }
}
