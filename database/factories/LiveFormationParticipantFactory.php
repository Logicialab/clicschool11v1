<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\LiveFormationParticipant;
use Illuminate\Database\Eloquent\Factories\Factory;

class LiveFormationParticipantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LiveFormationParticipant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time' => $this->faker->text(255),
            'live_formation_id' => \App\Models\LiveFormation::factory(),
            'student_id' => \App\Models\Student::factory(),
        ];
    }
}
