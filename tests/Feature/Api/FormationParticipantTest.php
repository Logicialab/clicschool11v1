<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\FormationParticipant;

use App\Models\Student;
use App\Models\Formation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationParticipantTest extends TestCase
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
    public function it_gets_formation_participants_list(): void
    {
        $formationParticipants = FormationParticipant::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.formation-participants.index'));

        $response->assertOk()->assertSee($formationParticipants[0]->time);
    }

    /**
     * @test
     */
    public function it_stores_the_formation_participant(): void
    {
        $data = FormationParticipant::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.formation-participants.store'),
            $data
        );

        $this->assertDatabaseHas('formation_participants', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_formation_participant(): void
    {
        $formationParticipant = FormationParticipant::factory()->create();

        $formation = Formation::factory()->create();
        $student = Student::factory()->create();

        $data = [
            'time' => $this->faker->text(255),
            'formation_id' => $formation->id,
            'student_id' => $student->id,
        ];

        $response = $this->putJson(
            route('api.formation-participants.update', $formationParticipant),
            $data
        );

        $data['id'] = $formationParticipant->id;

        $this->assertDatabaseHas('formation_participants', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_formation_participant(): void
    {
        $formationParticipant = FormationParticipant::factory()->create();

        $response = $this->deleteJson(
            route('api.formation-participants.destroy', $formationParticipant)
        );

        $this->assertModelMissing($formationParticipant);

        $response->assertNoContent();
    }
}
