<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ParentStudent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParentStudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ParentStudent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => \App\Models\Student::factory(),
            'parente_id' => \App\Models\Parente::factory(),
        ];
    }
}
