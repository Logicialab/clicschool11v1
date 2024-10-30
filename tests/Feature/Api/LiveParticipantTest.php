<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\LiveParticipant;

use App\Models\Live;
use App\Models\Student;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LiveParticipantTest extends TestCase
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
    public function it_gets_live_participants_list(): void
    {
        $liveParticipants = LiveParticipant::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.live-participants.index'));

        $response->assertOk()->assertSee($liveParticipants[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_live_participant(): void
    {
        $data = LiveParticipant::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.live-participants.store'),
            $data
        );

        $this->assertDatabaseHas('live_participants', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.live-participants.update', $liveParticipant),
            $data
        );

        $data['id'] = $liveParticipant->id;

        $this->assertDatabaseHas('live_participants', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_live_participant(): void
    {
        $liveParticipant = LiveParticipant::factory()->create();

        $response = $this->deleteJson(
            route('api.live-participants.destroy', $liveParticipant)
        );

        $this->assertModelMissing($liveParticipant);

        $response->assertNoContent();
    }
}
