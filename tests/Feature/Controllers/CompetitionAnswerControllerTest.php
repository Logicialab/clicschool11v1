<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CompetitionAnswer;

use App\Models\Student;
use App\Models\CompetitionQuestion;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetitionAnswerControllerTest extends TestCase
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
    public function it_displays_index_view_with_competition_answers(): void
    {
        $competitionAnswers = CompetitionAnswer::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('competition-answers.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.competition_answers.index')
            ->assertViewHas('competitionAnswers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_competition_answer(): void
    {
        $response = $this->get(route('competition-answers.create'));

        $response
            ->assertOk()
            ->assertViewIs('backend.competition_answers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_competition_answer(): void
    {
        $data = CompetitionAnswer::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('competition-answers.store'), $data);

        $this->assertDatabaseHas('competition_answers', $data);

        $competitionAnswer = CompetitionAnswer::latest('id')->first();

        $response->assertRedirect(
            route('competition-answers.edit', $competitionAnswer)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_competition_answer(): void
    {
        $competitionAnswer = CompetitionAnswer::factory()->create();

        $response = $this->get(
            route('competition-answers.show', $competitionAnswer)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.competition_answers.show')
            ->assertViewHas('competitionAnswer');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_competition_answer(): void
    {
        $competitionAnswer = CompetitionAnswer::factory()->create();

        $response = $this->get(
            route('competition-answers.edit', $competitionAnswer)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.competition_answers.edit')
            ->assertViewHas('competitionAnswer');
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

        $response = $this->put(
            route('competition-answers.update', $competitionAnswer),
            $data
        );

        $data['id'] = $competitionAnswer->id;

        $this->assertDatabaseHas('competition_answers', $data);

        $response->assertRedirect(
            route('competition-answers.edit', $competitionAnswer)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_competition_answer(): void
    {
        $competitionAnswer = CompetitionAnswer::factory()->create();

        $response = $this->delete(
            route('competition-answers.destroy', $competitionAnswer)
        );

        $response->assertRedirect(route('competition-answers.index'));

        $this->assertModelMissing($competitionAnswer);
    }
}
