<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\FormationType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationTypeTest extends TestCase
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
    public function it_gets_formation_types_list(): void
    {
        $formationTypes = FormationType::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.formation-types.index'));

        $response->assertOk()->assertSee($formationTypes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_formation_type(): void
    {
        $data = FormationType::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.formation-types.store'), $data);

        $this->assertDatabaseHas('formation_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_formation_type(): void
    {
        $formationType = FormationType::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->putJson(
            route('api.formation-types.update', $formationType),
            $data
        );

        $data['id'] = $formationType->id;

        $this->assertDatabaseHas('formation_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_formation_type(): void
    {
        $formationType = FormationType::factory()->create();

        $response = $this->deleteJson(
            route('api.formation-types.destroy', $formationType)
        );

        $this->assertModelMissing($formationType);

        $response->assertNoContent();
    }
}
