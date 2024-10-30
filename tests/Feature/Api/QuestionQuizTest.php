<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\QuestionQuiz;

use App\Models\Quiz;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionQuizTest extends TestCase
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
    public function it_gets_question_quizs_list(): void
    {
        $questionQuizs = QuestionQuiz::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.question-quizs.index'));

        $response->assertOk()->assertSee($questionQuizs[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_question_quiz(): void
    {
        $data = QuestionQuiz::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.question-quizs.store'), $data);

        $this->assertDatabaseHas('question_quizs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.question-quizs.update', $questionQuiz),
            $data
        );

        $data['id'] = $questionQuiz->id;

        $this->assertDatabaseHas('question_quizs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_question_quiz(): void
    {
        $questionQuiz = QuestionQuiz::factory()->create();

        $response = $this->deleteJson(
            route('api.question-quizs.destroy', $questionQuiz)
        );

        $this->assertModelMissing($questionQuiz);

        $response->assertNoContent();
    }
}
