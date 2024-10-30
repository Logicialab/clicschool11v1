<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\LiveParticipant;

use App\Models\Live;
use App\Models\Student;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LiveParticipantControllerTest extends TestCase
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
    public function it_displays_index_view_with_live_participants(): void
    {
        $liveParticipants = LiveParticipant::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('live-participants.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.live_participants.index')
            ->assertViewHas('liveParticipants');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_live_participant(): void
    {
        $response = $this->get(route('live-participants.create'));

        $response->assertOk()->assertViewIs('backend.live_participants.create');
    }

    /**
     * @test
     */
    public function it_stores_the_live_participant(): void
    {
        $data = LiveParticipant::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('live-participants.store'), $data);

        $this->assertDatabaseHas('live_participants', $data);

        $liveParticipant = LiveParticipant::latest('id')->first();

        $response->assertRedirect(
            route('live-participants.edit', $liveParticipant)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_live_participant(): void
    {
        $liveParticipant = LiveParticipant::factory()->create();

        $response = $this->get(
            route('live-participants.show', $liveParticipant)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.live_participants.show')
            ->assertViewHas('liveParticipant');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_live_participant(): void
    {
        $liveParticipant = LiveParticipant::factory()->create();

        $response = $this->get(
            route('live-participants.edit', $liveParticipant)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.live_participants.edit')
            ->assertViewHas('liveParticipant');
    }

    /**
     * @test
     */
    public function it_updates_the_live_participant(): void
    {
        $liveParticipant = LiveParticipant::factory()->create();

        $live = Live::factory()->create();
        $student = Student::factory()->create();

        $data = [
            'live_id' => $live->id,
            'student_id' => $student->id,
        ];

        $response = $this->put(
            route('live-participants.update', $liveParticipant),
            $data
        );

        $data['id'] = $liveParticipant->id;

        $this->assertDatabaseHas('live_participants', $data);

        $response->assertRedirect(
            route('live-participants.edit', $liveParticipant)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_live_participant(): void
    {
        $liveParticipant = LiveParticipant::factory()->create();

        $response = $this->delete(
            route('live-participants.destroy', $liveParticipant)
        );

        $response->assertRedirect(route('live-participants.index'));

        $this->assertModelMissing($liveParticipant);
    }
}
