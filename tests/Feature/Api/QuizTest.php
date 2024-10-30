<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Quiz;

use App\Models\Course;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizTest extends TestCase
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
    public function it_gets_quizzes_list(): void
    {
        $quizzes = Quiz::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.quizzes.index'));

        $response->assertOk()->assertSee($quizzes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_quiz(): void
    {
        $data = Quiz::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.quizzes.store'), $data);

        $this->assertDatabaseHas('quizzes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.quizzes.update', $quiz), $data);

        $data['id'] = $quiz->id;

        $this->assertDatabaseHas('quizzes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_quiz(): void
    {
        $quiz = Quiz::factory()->create();

        $response = $this->deleteJson(route('api.quizzes.destroy', $quiz));

        $this->assertModelMissing($quiz);

        $response->assertNoContent();
    }
}
