<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ExerciseSolution;

use App\Models\Exercice;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExerciseSolutionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_exercise_solutions_list(): void
    {
        $exerciseSolutions = ExerciseSolution::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.exercise-solutions.index'));

        $response->assertOk()->assertSee($exerciseSolutions[0]->solution);
    }

    /**
     * @test
     */
    public function it_stores_the_exercise_solution(): void
    {
        $data = ExerciseSolution::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.exercise-solutions.store'),
            $data
        );

        $this->assertDatabaseHas('exercise_solutions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.exercise-solutions.update', $exerciseSolution),
            $data
        );

        $data['id'] = $exerciseSolution->id;

        $this->assertDatabaseHas('exercise_solutions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_exercise_solution(): void
    {
        $exerciseSolution = ExerciseSolution::factory()->create();

        $response = $this->deleteJson(
            route('api.exercise-solutions.destroy', $exerciseSolution)
        );

        $this->assertModelMissing($exerciseSolution);

        $response->assertNoContent();
    }
}
