<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Formation;
use App\Models\FormationParticipant;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationFormationParticipantsTest extends TestCase
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
    public function it_gets_formation_formation_participants(): void
    {
        $formation = Formation::factory()->create();
        $formationParticipants = FormationParticipant::factory()
            ->count(2)
            ->create([
                'formation_id' => $formation->id,
            ]);

        $response = $this->getJson(
            route('api.formations.formation-participants.index', $formation)
        );

        $response->assertOk()->assertSee($formationParticipants[0]->time);
    }

    /**
     * @test
     */
    public function it_stores_the_formation_formation_participants(): void
    {
        $formation = Formation::factory()->create();
        $data = FormationParticipant::factory()
            ->make([
                'formation_id' => $formation->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.formations.formation-participants.store', $formation),
            $data
        );

        $this->assertDatabaseHas('formation_participants', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $formationParticipant = FormationParticipant::latest('id')->first();

        $this->assertEquals(
            $formation->id,
            $formationParticipant->formation_id
        );
    }
}
