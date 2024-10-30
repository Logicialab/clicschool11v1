<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Quiz;
use App\Models\Course;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseQuizzesTest extends TestCase
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
    public function it_gets_course_quizzes(): void
    {
        $course = Course::factory()->create();
        $quizzes = Quiz::factory()
            ->count(2)
            ->create([
                'course_id' => $course->id,
            ]);

        $response = $this->getJson(route('api.courses.quizzes.index', $course));

        $response->assertOk()->assertSee($quizzes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_course_quizzes(): void
    {
        $course = Course::factory()->create();
        $data = Quiz::factory()
            ->make([
                'course_id' => $course->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.courses.quizzes.store', $course),
            $data
        );

        $this->assertDatabaseHas('quizzes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $quiz = Quiz::latest('id')->first();

        $this->assertEquals($course->id, $quiz->course_id);
    }
}
