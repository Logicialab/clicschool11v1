<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompetitionAnswer;
use App\Models\CompetitionQuestion;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetitionQuestionCompetitionAnswersTest extends TestCase
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
    public function it_gets_competition_question_competition_answers(): void
    {
        $competitionQuestion = CompetitionQuestion::factory()->create();
        $competitionAnswers = CompetitionAnswer::factory()
            ->count(2)
            ->create([
                'competition_question_id' => $competitionQuestion->id,
            ]);

        $response = $this->getJson(
            route(
                'api.competition-questions.competition-answers.index',
                $competitionQuestion
            )
        );

        $response->assertOk()->assertSee($competitionAnswers[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_competition_question_competition_answers(): void
    {
        $competitionQuestion = CompetitionQuestion::factory()->create();
        $data = CompetitionAnswer::factory()
            ->make([
                'competition_question_id' => $competitionQuestion->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.competition-questions.competition-answers.store',
                $competitionQuestion
            ),
            $data
        );

        $this->assertDatabaseHas('competition_answers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $competitionAnswer = CompetitionAnswer::latest('id')->first();

        $this->assertEquals(
            $competitionQuestion->id,
            $competitionAnswer->competition_question_id
        );
    }
}
