<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Exercice;
use App\Models\ExerciseSolution;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExerciceExerciseSolutionsTest extends TestCase
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
    public function it_gets_exercice_exercise_solutions(): void
    {
        $exercice = Exercice::factory()->create();
        $exerciseSolutions = ExerciseSolution::factory()
            ->count(2)
            ->create([
                'exercice_id' => $exercice->id,
            ]);

        $response = $this->getJson(
            route('api.exercices.exercise-solutions.index', $exercice)
        );

        $response->assertOk()->assertSee($exerciseSolutions[0]->solution);
    }

    /**
     * @test
     */
    public function it_stores_the_exercice_exercise_solutions(): void
    {
        $exercice = Exercice::factory()->create();
        $data = ExerciseSolution::factory()
            ->make([
                'exercice_id' => $exercice->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.exercices.exercise-solutions.store', $exercice),
            $data
        );

        $this->assertDatabaseHas('exercise_solutions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $exerciseSolution = ExerciseSolution::latest('id')->first();

        $this->assertEquals($exercice->id, $exerciseSolution->exercice_id);
    }
}
