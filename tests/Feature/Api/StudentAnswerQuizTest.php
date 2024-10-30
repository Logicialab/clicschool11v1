<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StudentAnswerQuiz;

use App\Models\Student;
use App\Models\QuestionQuiz;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentAnswerQuizTest extends TestCase
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
    public function it_gets_student_answer_quizs_list(): void
    {
        $studentAnswerQuizs = StudentAnswerQuiz::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.student-answer-quizs.index'));

        $response->assertOk()->assertSee($studentAnswerQuizs[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_student_answer_quiz(): void
    {
        $data = StudentAnswerQuiz::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.student-answer-quizs.store'),
            $data
        );

        $this->assertDatabaseHas('student_answer_quizs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_student_answer_quiz(): void
    {
        $studentAnswerQuiz = StudentAnswerQuiz::factory()->create();

        $student = Student::factory()->create();
        $questionQuiz = QuestionQuiz::factory()->create();

        $data = [
            'text' => $this->faker->text(),
            'is_correct' => $this->faker->boolean(),
            'student_id' => $student->id,
            'questionQuiz_id' => $questionQuiz->id,
        ];

        $response = $this->putJson(
            route('api.student-answer-quizs.update', $studentAnswerQuiz),
            $data
        );

        $data['id'] = $studentAnswerQuiz->id;

        $this->assertDatabaseHas('student_answer_quizs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_student_answer_quiz(): void
    {
        $studentAnswerQuiz = StudentAnswerQuiz::factory()->create();

        $response = $this->deleteJson(
            route('api.student-answer-quizs.destroy', $studentAnswerQuiz)
        );

        $this->assertModelMissing($studentAnswerQuiz);

        $response->assertNoContent();
    }
}
