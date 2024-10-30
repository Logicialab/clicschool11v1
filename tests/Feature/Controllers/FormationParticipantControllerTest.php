<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\FormationParticipant;

use App\Models\Student;
use App\Models\Formation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationParticipantControllerTest extends TestCase
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
    public function it_displays_index_view_with_formation_participants(): void
    {
        $formationParticipants = FormationParticipant::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('formation-participants.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.formation_participants.index')
            ->assertViewHas('formationParticipants');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_formation_participant(): void
    {
        $response = $this->get(route('formation-participants.create'));

        $response
            ->assertOk()
            ->assertViewIs('backend.formation_participants.create');
    }

    /**
     * @test
     */
    public function it_stores_the_formation_participant(): void
    {
        $data = FormationParticipant::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('formation-participants.store'), $data);

        $this->assertDatabaseHas('formation_participants', $data);

        $formationParticipant = FormationParticipant::latest('id')->first();

        $response->assertRedirect(
            route('formation-participants.edit', $formationParticipant)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_formation_participant(): void
    {
        $formationParticipant = FormationParticipant::factory()->create();

        $response = $this->get(
            route('formation-participants.show', $formationParticipant)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.formation_participants.show')
            ->assertViewHas('formationParticipant');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_formation_participant(): void
    {
        $formationParticipant = FormationParticipant::factory()->create();

        $response = $this->get(
            route('formation-participants.edit', $formationParticipant)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.formation_participants.edit')
            ->assertViewHas('formationParticipant');
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

        $response = $this->put(
            route('formation-participants.update', $formationParticipant),
            $data
        );

        $data['id'] = $formationParticipant->id;

        $this->assertDatabaseHas('formation_participants', $data);

        $response->assertRedirect(
            route('formation-participants.edit', $formationParticipant)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_formation_participant(): void
    {
        $formationParticipant = FormationParticipant::factory()->create();

        $response = $this->delete(
            route('formation-participants.destroy', $formationParticipant)
        );

        $response->assertRedirect(route('formation-participants.index'));

        $this->assertModelMissing($formationParticipant);
    }
}
