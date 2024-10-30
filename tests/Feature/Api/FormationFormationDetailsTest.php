<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Formation;
use App\Models\FormationDetail;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationFormationDetailsTest extends TestCase
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
    public function it_gets_formation_formation_details(): void
    {
        $formation = Formation::factory()->create();
        $formationDetails = FormationDetail::factory()
            ->count(2)
            ->create([
                'formation_id' => $formation->id,
            ]);

        $response = $this->getJson(
            route('api.formations.formation-details.index', $formation)
        );

        $response->assertOk()->assertSee($formationDetails[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_formation_formation_details(): void
    {
        $formation = Formation::factory()->create();
        $data = FormationDetail::factory()
            ->make([
                'formation_id' => $formation->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.formations.formation-details.store', $formation),
            $data
        );

        $this->assertDatabaseHas('formation_details', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $formationDetail = FormationDetail::latest('id')->first();

        $this->assertEquals($formation->id, $formationDetail->formation_id);
    }
}
