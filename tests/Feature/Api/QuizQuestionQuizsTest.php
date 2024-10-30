<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Quiz;
use App\Models\QuestionQuiz;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizQuestionQuizsTest extends TestCase
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
    public function it_gets_quiz_question_quizs(): void
    {
        $quiz = Quiz::factory()->create();
        $questionQuizs = QuestionQuiz::factory()
            ->count(2)
            ->create([
                'quiz_id' => $quiz->id,
            ]);

        $response = $this->getJson(
            route('api.quizzes.question-quizs.index', $quiz)
        );

        $response->assertOk()->assertSee($questionQuizs[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_quiz_question_quizs(): void
    {
        $quiz = Quiz::factory()->create();
        $data = QuestionQuiz::factory()
            ->make([
                'quiz_id' => $quiz->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.quizzes.question-quizs.store', $quiz),
            $data
        );

        $this->assertDatabaseHas('question_quizs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $questionQuiz = QuestionQuiz::latest('id')->first();

        $this->assertEquals($quiz->id, $questionQuiz->quiz_id);
    }
}
