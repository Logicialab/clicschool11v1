<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Course;
use App\Models\Subject;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectCoursesTest extends TestCase
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
    public function it_gets_subject_courses(): void
    {
        $subject = Subject::factory()->create();
        $courses = Course::factory()
            ->count(2)
            ->create([
                'subject_id' => $subject->id,
            ]);

        $response = $this->getJson(
            route('api.subjects.courses.index', $subject)
        );

        $response->assertOk()->assertSee($courses[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_subject_courses(): void
    {
        $subject = Subject::factory()->create();
        $data = Course::factory()
            ->make([
                'subject_id' => $subject->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.subjects.courses.store', $subject),
            $data
        );

        $this->assertDatabaseHas('courses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $course = Course::latest('id')->first();

        $this->assertEquals($subject->id, $course->subject_id);
    }
}
