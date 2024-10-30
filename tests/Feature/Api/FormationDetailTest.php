<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\FormationDetail;

use App\Models\Formation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationDetailTest extends TestCase
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
    public function it_gets_formation_details_list(): void
    {
        $formationDetails = FormationDetail::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.formation-details.index'));

        $response->assertOk()->assertSee($formationDetails[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_formation_detail(): void
    {
        $data = FormationDetail::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.formation-details.store'),
            $data
        );

        $this->assertDatabaseHas('formation_details', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_formation_detail(): void
    {
        $formationDetail = FormationDetail::factory()->create();

        $formation = Formation::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'url' => $this->faker->url(),
            'description' => $this->faker->sentence(15),
            'formation_id' => $formation->id,
        ];

        $response = $this->putJson(
            route('api.formation-details.update', $formationDetail),
            $data
        );

        $data['id'] = $formationDetail->id;

        $this->assertDatabaseHas('formation_details', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_formation_detail(): void
    {
        $formationDetail = FormationDetail::factory()->create();

        $response = $this->deleteJson(
            route('api.formation-details.destroy', $formationDetail)
        );

        $this->assertModelMissing($formationDetail);

        $response->assertNoContent();
    }
}
