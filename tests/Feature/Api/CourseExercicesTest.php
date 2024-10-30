<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Course;
use App\Models\Exercice;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseExercicesTest extends TestCase
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
    public function it_gets_course_exercices(): void
    {
        $course = Course::factory()->create();
        $exercices = Exercice::factory()
            ->count(2)
            ->create([
                'course_id' => $course->id,
            ]);

        $response = $this->getJson(
            route('api.courses.exercices.index', $course)
        );

        $response->assertOk()->assertSee($exercices[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_course_exercices(): void
    {
        $course = Course::factory()->create();
        $data = Exercice::factory()
            ->make([
                'course_id' => $course->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.courses.exercices.store', $course),
            $data
        );

        $this->assertDatabaseHas('exercices', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $exercice = Exercice::latest('id')->first();

        $this->assertEquals($course->id, $exercice->course_id);
    }
}
