<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Student;
use App\Models\FormationParticipant;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentFormationParticipantsTest extends TestCase
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
    public function it_gets_student_formation_participants(): void
    {
        $student = Student::factory()->create();
        $formationParticipants = FormationParticipant::factory()
            ->count(2)
            ->create([
                'student_id' => $student->id,
            ]);

        $response = $this->getJson(
            route('api.students.formation-participants.index', $student)
        );

        $response->assertOk()->assertSee($formationParticipants[0]->time);
    }

    /**
     * @test
     */
    public function it_stores_the_student_formation_participants(): void
    {
        $student = Student::factory()->create();
        $data = FormationParticipant::factory()
            ->make([
                'student_id' => $student->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.students.formation-participants.store', $student),
            $data
        );

        $this->assertDatabaseHas('formation_participants', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $formationParticipant = FormationParticipant::latest('id')->first();

        $this->assertEquals($student->id, $formationParticipant->student_id);
    }
}
