<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompetitionAnswer;

use App\Models\Student;
use App\Models\CompetitionQuestion;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetitionAnswerTest extends TestCase
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
    public function it_gets_competition_answers_list(): void
    {
        $competitionAnswers = CompetitionAnswer::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.competition-answers.index'));

        $response->assertOk()->assertSee($competitionAnswers[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_competition_answer(): void
    {
        $data = CompetitionAnswer::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.competition-answers.store'),
            $data
        );

        $this->assertDatabaseHas('competition_answers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_competition_answer(): void
    {
        $competitionAnswer = CompetitionAnswer::factory()->create();

        $competitionQuestion = CompetitionQuestion::factory()->create();
        $student = Student::factory()->create();

        $data = [
            'text' => $this->faker->text(),
            'is_correct' => $this->faker->boolean(),
            'competition_question_id' => $competitionQuestion->id,
            'student_id' => $student->id,
        ];

        $response = $this->putJson(
            route('api.competition-answers.update', $competitionAnswer),
            $data
        );

        $data['id'] = $competitionAnswer->id;

        $this->assertDatabaseHas('competition_answers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_competition_answer(): void
    {
        $competitionAnswer = CompetitionAnswer::factory()->create();

        $response = $this->deleteJson(
            route('api.competition-answers.destroy', $competitionAnswer)
        );

        $this->assertModelMissing($competitionAnswer);

        $response->assertNoContent();
    }
}
