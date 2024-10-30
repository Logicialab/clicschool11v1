<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Course;

use App\Models\Subject;
use App\Models\Teacher;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseControllerTest extends TestCase
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
    public function it_displays_index_view_with_courses(): void
    {
        $courses = Course::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('courses.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.courses.index')
            ->assertViewHas('courses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_course(): void
    {
        $response = $this->get(route('courses.create'));

        $response->assertOk()->assertViewIs('backend.courses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_course(): void
    {
        $data = Course::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('courses.store'), $data);

        $this->assertDatabaseHas('courses', $data);

        $course = Course::latest('id')->first();

        $response->assertRedirect(route('courses.edit', $course));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_course(): void
    {
        $course = Course::factory()->create();

        $response = $this->get(route('courses.show', $course));

        $response
            ->assertOk()
            ->assertViewIs('backend.courses.show')
            ->assertViewHas('course');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_course(): void
    {
        $course = Course::factory()->create();

        $response = $this->get(route('courses.edit', $course));

        $response
            ->assertOk()
            ->assertViewIs('backend.courses.edit')
            ->assertViewHas('course');
    }

    /**
     * @test
     */
    public function it_updates_the_course(): void
    {
        $course = Course::factory()->create();

        $subject = Subject::factory()->create();
        $teacher = Teacher::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'body' => $this->faker->text(),
            'order' => $this->faker->randomNumber(0),
            'active' => $this->faker->boolean(),
            'subject_id' => $subject->id,
            'teacher_id' => $teacher->id,
        ];

        $response = $this->put(route('courses.update', $course), $data);

        $data['id'] = $course->id;

        $this->assertDatabaseHas('courses', $data);

        $response->assertRedirect(route('courses.edit', $course));
    }

    /**
     * @test
     */
    public function it_deletes_the_course(): void
    {
        $course = Course::factory()->create();

        $response = $this->delete(route('courses.destroy', $course));

        $response->assertRedirect(route('courses.index'));

        $this->assertSoftDeleted($course);
    }
}
