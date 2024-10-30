<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\QuestionQuiz;

use App\Models\Quiz;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionQuizControllerTest extends TestCase
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
    public function it_displays_index_view_with_question_quizs(): void
    {
        $questionQuizs = QuestionQuiz::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('question-quizs.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.question_quizs.index')
            ->assertViewHas('questionQuizs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_question_quiz(): void
    {
        $response = $this->get(route('question-quizs.create'));

        $response->assertOk()->assertViewIs('backend.question_quizs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_question_quiz(): void
    {
        $data = QuestionQuiz::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('question-quizs.store'), $data);

        $this->assertDatabaseHas('question_quizs', $data);

        $questionQuiz = QuestionQuiz::latest('id')->first();

        $response->assertRedirect(route('question-quizs.edit', $questionQuiz));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_question_quiz(): void
    {
        $questionQuiz = QuestionQuiz::factory()->create();

        $response = $this->get(route('question-quizs.show', $questionQuiz));

        $response
            ->assertOk()
            ->assertViewIs('backend.question_quizs.show')
            ->assertViewHas('questionQuiz');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_question_quiz(): void
    {
        $questionQuiz = QuestionQuiz::factory()->create();

        $response = $this->get(route('question-quizs.edit', $questionQuiz));

        $response
            ->assertOk()
            ->assertViewIs('backend.question_quizs.edit')
            ->assertViewHas('questionQuiz');
    }

    /**
     * @test
     */
    public function it_updates_the_question_quiz(): void
    {
        $questionQuiz = QuestionQuiz::factory()->create();

        $quiz = Quiz::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'type' => $this->faker->word(),
            'quiz_id' => $quiz->id,
        ];

        $response = $this->put(
            route('question-quizs.update', $questionQuiz),
            $data
        );

        $data['id'] = $questionQuiz->id;

        $this->assertDatabaseHas('question_quizs', $data);

        $response->assertRedirect(route('question-quizs.edit', $questionQuiz));
    }

    /**
     * @test
     */
    public function it_deletes_the_question_quiz(): void
    {
        $questionQuiz = QuestionQuiz::factory()->create();

        $response = $this->delete(
            route('question-quizs.destroy', $questionQuiz)
        );

        $response->assertRedirect(route('question-quizs.index'));

        $this->assertModelMissing($questionQuiz);
    }
}
