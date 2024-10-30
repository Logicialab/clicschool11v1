<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Formation;

use App\Models\Teacher;
use App\Models\FormationType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationTest extends TestCase
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
    public function it_gets_formations_list(): void
    {
        $formations = Formation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.formations.index'));

        $response->assertOk()->assertSee($formations[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_formation(): void
    {
        $data = Formation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.formations.store'), $data);

        $this->assertDatabaseHas('formations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_formation(): void
    {
        $formation = Formation::factory()->create();

        $formationType = FormationType::factory()->create();
        $teacher = Teacher::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'status' => $this->faker->word(),
            'active' => $this->faker->boolean(),
            'formation_type_id' => $formationType->id,
            'teacher_id' => $teacher->id,
        ];

        $response = $this->putJson(
            route('api.formations.update', $formation),
            $data
        );

        $data['id'] = $formation->id;

        $this->assertDatabaseHas('formations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_formation(): void
    {
        $formation = Formation::factory()->create();

        $response = $this->deleteJson(
            route('api.formations.destroy', $formation)
        );

        $this->assertSoftDeleted($formation);

        $response->assertNoContent();
    }
}
