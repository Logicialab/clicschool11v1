<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CompetitionQuestion;

use App\Models\Competition;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetitionQuestionControllerTest extends TestCase
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
    public function it_displays_index_view_with_competition_questions(): void
    {
        $competitionQuestions = CompetitionQuestion::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('competition-questions.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.competition_questions.index')
            ->assertViewHas('competitionQuestions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_competition_question(): void
    {
        $response = $this->get(route('competition-questions.create'));

        $response
            ->assertOk()
            ->assertViewIs('backend.competition_questions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_competition_question(): void
    {
        $data = CompetitionQuestion::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('competition-questions.store'), $data);

        $this->assertDatabaseHas('competition_questions', $data);

        $competitionQuestion = CompetitionQuestion::latest('id')->first();

        $response->assertRedirect(
            route('competition-questions.edit', $competitionQuestion)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_competition_question(): void
    {
        $competitionQuestion = CompetitionQuestion::factory()->create();

        $response = $this->get(
            route('competition-questions.show', $competitionQuestion)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.competition_questions.show')
            ->assertViewHas('competitionQuestion');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_competition_question(): void
    {
        $competitionQuestion = CompetitionQuestion::factory()->create();

        $response = $this->get(
            route('competition-questions.edit', $competitionQuestion)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.competition_questions.edit')
            ->assertViewHas('competitionQuestion');
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

        $response = $this->put(
            route('competition-questions.update', $competitionQuestion),
            $data
        );

        $data['id'] = $competitionQuestion->id;

        $this->assertDatabaseHas('competition_questions', $data);

        $response->assertRedirect(
            route('competition-questions.edit', $competitionQuestion)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_competition_question(): void
    {
        $competitionQuestion = CompetitionQuestion::factory()->create();

        $response = $this->delete(
            route('competition-questions.destroy', $competitionQuestion)
        );

        $response->assertRedirect(route('competition-questions.index'));

        $this->assertModelMissing($competitionQuestion);
    }
}
