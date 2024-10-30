<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ExerciseSolution;

use App\Models\Exercice;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExerciseSolutionControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_exercise_solutions(): void
    {
        $exerciseSolutions = ExerciseSolution::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('exercise-solutions.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.exercise_solutions.index')
            ->assertViewHas('exerciseSolutions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_exercise_solution(): void
    {
        $response = $this->get(route('exercise-solutions.create'));

        $response
            ->assertOk()
            ->assertViewIs('backend.exercise_solutions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_exercise_solution(): void
    {
        $data = ExerciseSolution::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('exercise-solutions.store'), $data);

        $this->assertDatabaseHas('exercise_solutions', $data);

        $exerciseSolution = ExerciseSolution::latest('id')->first();

        $response->assertRedirect(
            route('exercise-solutions.edit', $exerciseSolution)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_exercise_solution(): void
    {
        $exerciseSolution = ExerciseSolution::factory()->create();

        $response = $this->get(
            route('exercise-solutions.show', $exerciseSolution)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.exercise_solutions.show')
            ->assertViewHas('exerciseSolution');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_exercise_solution(): void
    {
        $exerciseSolution = ExerciseSolution::factory()->create();

        $response = $this->get(
            route('exercise-solutions.edit', $exerciseSolution)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.exercise_solutions.edit')
            ->assertViewHas('exerciseSolution');
    }

    /**
     * @test
     */
    public function it_updates_the_exercise_solution(): void
    {
        $exerciseSolution = ExerciseSolution::factory()->create();

        $exercice = Exercice::factory()->create();

        $data = [
            'solution' => $this->faker->text(),
            'active' => $this->faker->boolean(),
            'exercice_id' => $exercice->id,
        ];

        $response = $this->put(
            route('exercise-solutions.update', $exerciseSolution),
            $data
        );

        $data['id'] = $exerciseSolution->id;

        $this->assertDatabaseHas('exercise_solutions', $data);

        $response->assertRedirect(
            route('exercise-solutions.edit', $exerciseSolution)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_exercise_solution(): void
    {
        $exerciseSolution = ExerciseSolution::factory()->create();

        $response = $this->delete(
            route('exercise-solutions.destroy', $exerciseSolution)
        );

        $response->assertRedirect(route('exercise-solutions.index'));

        $this->assertModelMissing($exerciseSolution);
    }
}
