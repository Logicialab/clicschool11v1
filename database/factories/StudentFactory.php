<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(255),
            'slug' => $this->faker->unique->slug(),
            'nickname' => $this->faker->text(255),
            'home_adress' => $this->faker->text(255),
            'street' => $this->faker->streetName(),
            'neighborhood' => $this->faker->text(255),
            'city' => $this->faker->city(),
            'school_name' => $this->faker->text(255),
            'student_level' => $this->faker->text(255),
            'name_guardian' => $this->faker->text(255),
            'Profession' => $this->faker->text(255),
            'etablissement_travail' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
            'classe_id' => \App\Models\Classe::factory(),
        ];
    }
}
