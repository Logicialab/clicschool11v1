<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\QuestionQuiz;
use App\Models\StudentAnswerQuiz;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionQuizStudentAnswerQuizsTest extends TestCase
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
    public function it_gets_question_quiz_student_answer_quizs(): void
    {
        $questionQuiz = QuestionQuiz::factory()->create();
        $studentAnswerQuizs = StudentAnswerQuiz::factory()
            ->count(2)
            ->create([
                'questionQuiz_id' => $questionQuiz->id,
            ]);

        $response = $this->getJson(
            route(
                'api.question-quizs.student-answer-quizs.index',
                $questionQuiz
            )
        );

        $response->assertOk()->assertSee($studentAnswerQuizs[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_question_quiz_student_answer_quizs(): void
    {
        $questionQuiz = QuestionQuiz::factory()->create();
        $data = StudentAnswerQuiz::factory()
            ->make([
                'questionQuiz_id' => $questionQuiz->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.question-quizs.student-answer-quizs.store',
                $questionQuiz
            ),
            $data
        );

        $this->assertDatabaseHas('student_answer_quizs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $studentAnswerQuiz = StudentAnswerQuiz::latest('id')->first();

        $this->assertEquals(
            $questionQuiz->id,
            $studentAnswerQuiz->questionQuiz_id
        );
    }
}
