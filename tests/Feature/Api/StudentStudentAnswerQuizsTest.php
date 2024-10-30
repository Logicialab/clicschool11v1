<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Student;
use App\Models\StudentAnswerQuiz;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentStudentAnswerQuizsTest extends TestCase
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
    public function it_gets_student_student_answer_quizs(): void
    {
        $student = Student::factory()->create();
        $studentAnswerQuizs = StudentAnswerQuiz::factory()
            ->count(2)
            ->create([
                'student_id' => $student->id,
            ]);

        $response = $this->getJson(
            route('api.students.student-answer-quizs.index', $student)
        );

        $response->assertOk()->assertSee($studentAnswerQuizs[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_student_student_answer_quizs(): void
    {
        $student = Student::factory()->create();
        $data = StudentAnswerQuiz::factory()
            ->make([
                'student_id' => $student->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.students.student-answer-quizs.store', $student),
            $data
        );

        $this->assertDatabaseHas('student_answer_quizs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $studentAnswerQuiz = StudentAnswerQuiz::latest('id')->first();

        $this->assertEquals($student->id, $studentAnswerQuiz->student_id);
    }
}
