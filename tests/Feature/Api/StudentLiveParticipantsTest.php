<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Student;
use App\Models\LiveParticipant;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentLiveParticipantsTest extends TestCase
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
    public function it_gets_student_live_participants(): void
    {
        $student = Student::factory()->create();
        $liveParticipants = LiveParticipant::factory()
            ->count(2)
            ->create([
                'student_id' => $student->id,
            ]);

        $response = $this->getJson(
            route('api.students.live-participants.index', $student)
        );

        $response->assertOk()->assertSee($liveParticipants[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_student_live_participants(): void
    {
        $student = Student::factory()->create();
        $data = LiveParticipant::factory()
            ->make([
                'student_id' => $student->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.students.live-participants.store', $student),
            $data
        );

        $this->assertDatabaseHas('live_participants', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $liveParticipant = LiveParticipant::latest('id')->first();

        $this->assertEquals($student->id, $liveParticipant->student_id);
    }
}
