<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Competition;
use App\Models\CompetitionQuestion;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetitionCompetitionQuestionsTest extends TestCase
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
    public function it_gets_competition_competition_questions(): void
    {
        $competition = Competition::factory()->create();
        $competitionQuestions = CompetitionQuestion::factory()
            ->count(2)
            ->create([
                'competition_id' => $competition->id,
            ]);

        $response = $this->getJson(
            route('api.competitions.competition-questions.index', $competition)
        );

        $response->assertOk()->assertSee($competitionQuestions[0]->question);
    }

    /**
     * @test
     */
    public function it_stores_the_competition_competition_questions(): void
    {
        $competition = Competition::factory()->create();
        $data = CompetitionQuestion::factory()
            ->make([
                'competition_id' => $competition->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.competitions.competition-questions.store', $competition),
            $data
        );

        $this->assertDatabaseHas('competition_questions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $competitionQuestion = CompetitionQuestion::latest('id')->first();

        $this->assertEquals(
            $competition->id,
            $competitionQuestion->competition_id
        );
    }
}
