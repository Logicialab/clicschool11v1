<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Live;
use App\Models\LiveParticipant;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LiveLiveParticipantsTest extends TestCase
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
    public function it_gets_live_live_participants(): void
    {
        $live = Live::factory()->create();
        $liveParticipants = LiveParticipant::factory()
            ->count(2)
            ->create([
                'live_id' => $live->id,
            ]);

        $response = $this->getJson(
            route('api.lives.live-participants.index', $live)
        );

        $response->assertOk()->assertSee($liveParticipants[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_live_live_participants(): void
    {
        $live = Live::factory()->create();
        $data = LiveParticipant::factory()
            ->make([
                'live_id' => $live->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.lives.live-participants.store', $live),
            $data
        );

        $this->assertDatabaseHas('live_participants', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $liveParticipant = LiveParticipant::latest('id')->first();

        $this->assertEquals($live->id, $liveParticipant->live_id);
    }
}
