<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\FormationParticipant;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationParticipantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormationParticipant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time' => $this->faker->text(255),
            'formation_id' => \App\Models\Formation::factory(),
            'student_id' => \App\Models\Student::factory(),
        ];
    }
}
