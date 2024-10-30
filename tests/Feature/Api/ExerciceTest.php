<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Exercice;

use App\Models\Course;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExerciceTest extends TestCase
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
    public function it_gets_exercices_list(): void
    {
        $exercices = Exercice::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.exercices.index'));

        $response->assertOk()->assertSee($exercices[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_exercice(): void
    {
        $data = Exercice::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.exercices.store'), $data);

        $this->assertDatabaseHas('exercices', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_exercice(): void
    {
        $exercice = Exercice::factory()->create();

        $course = Course::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'active' => $this->faker->boolean(),
            'order' => $this->faker->randomNumber(0),
            'course_id' => $course->id,
        ];

        $response = $this->putJson(
            route('api.exercices.update', $exercice),
            $data
        );

        $data['id'] = $exercice->id;

        $this->assertDatabaseHas('exercices', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_exercice(): void
    {
        $exercice = Exercice::factory()->create();

        $response = $this->deleteJson(
            route('api.exercices.destroy', $exercice)
        );

        $this->assertSoftDeleted($exercice);

        $response->assertNoContent();
    }
}
