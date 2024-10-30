<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Quiz;

use App\Models\Course;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizControllerTest extends TestCase
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
    public function it_displays_index_view_with_quizzes(): void
    {
        $quizzes = Quiz::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('quizzes.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.quizzes.index')
            ->assertViewHas('quizzes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_quiz(): void
    {
        $response = $this->get(route('quizzes.create'));

        $response->assertOk()->assertViewIs('backend.quizzes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_quiz(): void
    {
        $data = Quiz::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('quizzes.store'), $data);

        $this->assertDatabaseHas('quizzes', $data);

        $quiz = Quiz::latest('id')->first();

        $response->assertRedirect(route('quizzes.edit', $quiz));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_quiz(): void
    {
        $quiz = Quiz::factory()->create();

        $response = $this->get(route('quizzes.show', $quiz));

        $response
            ->assertOk()
            ->assertViewIs('backend.quizzes.show')
            ->assertViewHas('quiz');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_quiz(): void
    {
        $quiz = Quiz::factory()->create();

        $response = $this->get(route('quizzes.edit', $quiz));

        $response
            ->assertOk()
            ->assertViewIs('backend.quizzes.edit')
            ->assertViewHas('quiz');
    }

    /**
     * @test
     */
    public function it_updates_the_quiz(): void
    {
        $quiz = Quiz::factory()->create();

        $course = Course::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'active' => $this->faker->boolean(),
            'order' => $this->faker->randomNumber(0),
            'course_id' => $course->id,
        ];

        $response = $this->put(route('quizzes.update', $quiz), $data);

        $data['id'] = $quiz->id;

        $this->assertDatabaseHas('quizzes', $data);

        $response->assertRedirect(route('quizzes.edit', $quiz));
    }

    /**
     * @test
     */
    public function it_deletes_the_quiz(): void
    {
        $quiz = Quiz::factory()->create();

        $response = $this->delete(route('quizzes.destroy', $quiz));

        $response->assertRedirect(route('quizzes.index'));

        $this->assertModelMissing($quiz);
    }
}
