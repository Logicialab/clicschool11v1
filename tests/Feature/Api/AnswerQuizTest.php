<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AnswerQuiz;

use App\Models\QuestionQuiz;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerQuizTest extends TestCase
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
    public function it_gets_answer_quizs_list(): void
    {
        $answerQuizs = AnswerQuiz::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.answer-quizs.index'));

        $response->assertOk()->assertSee($answerQuizs[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_answer_quiz(): void
    {
        $data = AnswerQuiz::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.answer-quizs.store'), $data);

        $this->assertDatabaseHas('answer_quizs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.answer-quizs.update', $answerQuiz),
            $data
        );

        $data['id'] = $answerQuiz->id;

        $this->assertDatabaseHas('answer_quizs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_answer_quiz(): void
    {
        $answerQuiz = AnswerQuiz::factory()->create();

        $response = $this->deleteJson(
            route('api.answer-quizs.destroy', $answerQuiz)
        );

        $this->assertModelMissing($answerQuiz);

        $response->assertNoContent();
    }
}
