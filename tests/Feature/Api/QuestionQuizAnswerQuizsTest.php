<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AnswerQuiz;
use App\Models\QuestionQuiz;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionQuizAnswerQuizsTest extends TestCase
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
    public function it_gets_question_quiz_answer_quizs(): void
    {
        $questionQuiz = QuestionQuiz::factory()->create();
        $answerQuizs = AnswerQuiz::factory()
            ->count(2)
            ->create([
                'questionQuiz_id' => $questionQuiz->id,
            ]);

        $response = $this->getJson(
            route('api.question-quizs.answer-quizs.index', $questionQuiz)
        );

        $response->assertOk()->assertSee($answerQuizs[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_question_quiz_answer_quizs(): void
    {
        $questionQuiz = QuestionQuiz::factory()->create();
        $data = AnswerQuiz::factory()
            ->make([
                'questionQuiz_id' => $questionQuiz->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.question-quizs.answer-quizs.store', $questionQuiz),
            $data
        );

        $this->assertDatabaseHas('answer_quizs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $answerQuiz = AnswerQuiz::latest('id')->first();

        $this->assertEquals($questionQuiz->id, $answerQuiz->questionQuiz_id);
    }
}
