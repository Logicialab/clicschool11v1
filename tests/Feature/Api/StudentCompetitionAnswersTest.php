<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Student;
use App\Models\CompetitionAnswer;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentCompetitionAnswersTest extends TestCase
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
    public function it_gets_student_competition_answers(): void
    {
        $student = Student::factory()->create();
        $competitionAnswers = CompetitionAnswer::factory()
            ->count(2)
            ->create([
                'student_id' => $student->id,
            ]);

        $response = $this->getJson(
            route('api.students.competition-answers.index', $student)
        );

        $response->assertOk()->assertSee($competitionAnswers[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_student_competition_answers(): void
    {
        $student = Student::factory()->create();
        $data = CompetitionAnswer::factory()
            ->make([
                'student_id' => $student->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.students.competition-answers.store', $student),
            $data
        );

        $this->assertDatabaseHas('competition_answers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $competitionAnswer = CompetitionAnswer::latest('id')->first();

        $this->assertEquals($student->id, $competitionAnswer->student_id);
    }
}
