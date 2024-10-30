<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AnswerQuiz;

use App\Models\QuestionQuiz;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerQuizControllerTest extends TestCase
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
    public function it_displays_index_view_with_answer_quizs(): void
    {
        $answerQuizs = AnswerQuiz::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('answer-quizs.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.answer_quizs.index')
            ->assertViewHas('answerQuizs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_answer_quiz(): void
    {
        $response = $this->get(route('answer-quizs.create'));

        $response->assertOk()->assertViewIs('backend.answer_quizs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_answer_quiz(): void
    {
        $data = AnswerQuiz::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('answer-quizs.store'), $data);

        $this->assertDatabaseHas('answer_quizs', $data);

        $answerQuiz = AnswerQuiz::latest('id')->first();

        $response->assertRedirect(route('answer-quizs.edit', $answerQuiz));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_answer_quiz(): void
    {
        $answerQuiz = AnswerQuiz::factory()->create();

        $response = $this->get(route('answer-quizs.show', $answerQuiz));

        $response
            ->assertOk()
            ->assertViewIs('backend.answer_quizs.show')
            ->assertViewHas('answerQuiz');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_answer_quiz(): void
    {
        $answerQuiz = AnswerQuiz::factory()->create();

        $response = $this->get(route('answer-quizs.edit', $answerQuiz));

        $response
            ->assertOk()
            ->assertViewIs('backend.answer_quizs.edit')
            ->assertViewHas('answerQuiz');
    }

    /**
     * @test
     */
    public function it_updates_the_answer_quiz(): void
    {
        $answerQuiz = AnswerQuiz::factory()->create();

        $questionQuiz = QuestionQuiz::factory()->create();

        $data = [
            'text' => $this->faker->text(),
            'questionQuiz_id' => $questionQuiz->id,
        ];

        $response = $this->put(
            route('answer-quizs.update', $answerQuiz),
            $data
        );

        $data['id'] = $answerQuiz->id;

        $this->assertDatabaseHas('answer_quizs', $data);

        $response->assertRedirect(route('answer-quizs.edit', $answerQuiz));
    }

    /**
     * @test
     */
    public function it_deletes_the_answer_quiz(): void
    {
        $answerQuiz = AnswerQuiz::factory()->create();

        $response = $this->delete(route('answer-quizs.destroy', $answerQuiz));

        $response->assertRedirect(route('answer-quizs.index'));

        $this->assertModelMissing($answerQuiz);
    }
}
