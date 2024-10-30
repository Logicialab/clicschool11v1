<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CompetitionQuestion;

use App\Models\Competition;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetitionQuestionTest extends TestCase
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
    public function it_gets_competition_questions_list(): void
    {
        $competitionQuestions = CompetitionQuestion::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.competition-questions.index'));

        $response->assertOk()->assertSee($competitionQuestions[0]->question);
    }

    /**
     * @test
     */
    public function it_stores_the_competition_question(): void
    {
        $data = CompetitionQuestion::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.competition-questions.store'),
            $data
        );

        $this->assertDatabaseHas('competition_questions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_competition_question(): void
    {
        $competitionQuestion = CompetitionQuestion::factory()->create();

        $competition = Competition::factory()->create();

        $data = [
            'question' => $this->faker->text(255),
            'question_type' => $this->faker->text(255),
            'competition_id' => $competition->id,
        ];

        $response = $this->putJson(
            route('api.competition-questions.update', $competitionQuestion),
            $data
        );

        $data['id'] = $competitionQuestion->id;

        $this->assertDatabaseHas('competition_questions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_competition_question(): void
    {
        $competitionQuestion = CompetitionQuestion::factory()->create();

        $response = $this->deleteJson(
            route('api.competition-questions.destroy', $competitionQuestion)
        );

        $this->assertModelMissing($competitionQuestion);

        $response->assertNoContent();
    }
}
