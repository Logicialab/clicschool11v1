<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\StudentAnswerQuiz;

use App\Models\Student;
use App\Models\QuestionQuiz;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentAnswerQuizControllerTest extends TestCase
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
    public function it_displays_index_view_with_student_answer_quizs(): void
    {
        $studentAnswerQuizs = StudentAnswerQuiz::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('student-answer-quizs.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.student_answer_quizs.index')
            ->assertViewHas('studentAnswerQuizs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_student_answer_quiz(): void
    {
        $response = $this->get(route('student-answer-quizs.create'));

        $response
            ->assertOk()
            ->assertViewIs('backend.student_answer_quizs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_student_answer_quiz(): void
    {
        $data = StudentAnswerQuiz::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('student-answer-quizs.store'), $data);

        $this->assertDatabaseHas('student_answer_quizs', $data);

        $studentAnswerQuiz = StudentAnswerQuiz::latest('id')->first();

        $response->assertRedirect(
            route('student-answer-quizs.edit', $studentAnswerQuiz)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_student_answer_quiz(): void
    {
        $studentAnswerQuiz = StudentAnswerQuiz::factory()->create();

        $response = $this->get(
            route('student-answer-quizs.show', $studentAnswerQuiz)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.student_answer_quizs.show')
            ->assertViewHas('studentAnswerQuiz');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_student_answer_quiz(): void
    {
        $studentAnswerQuiz = StudentAnswerQuiz::factory()->create();

        $response = $this->get(
            route('student-answer-quizs.edit', $studentAnswerQuiz)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.student_answer_quizs.edit')
            ->assertViewHas('studentAnswerQuiz');
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

        $response = $this->put(
            route('student-answer-quizs.update', $studentAnswerQuiz),
            $data
        );

        $data['id'] = $studentAnswerQuiz->id;

        $this->assertDatabaseHas('student_answer_quizs', $data);

        $response->assertRedirect(
            route('student-answer-quizs.edit', $studentAnswerQuiz)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_student_answer_quiz(): void
    {
        $studentAnswerQuiz = StudentAnswerQuiz::factory()->create();

        $response = $this->delete(
            route('student-answer-quizs.destroy', $studentAnswerQuiz)
        );

        $response->assertRedirect(route('student-answer-quizs.index'));

        $this->assertModelMissing($studentAnswerQuiz);
    }
}
