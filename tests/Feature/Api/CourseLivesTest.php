<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Live;
use App\Models\Course;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseLivesTest extends TestCase
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
    public function it_gets_course_lives(): void
    {
        $course = Course::factory()->create();
        $lives = Live::factory()
            ->count(2)
            ->create([
                'course_id' => $course->id,
            ]);

        $response = $this->getJson(route('api.courses.lives.index', $course));

        $response->assertOk()->assertSee($lives[0]->url);
    }

    /**
     * @test
     */
    public function it_stores_the_course_lives(): void
    {
        $course = Course::factory()->create();
        $data = Live::factory()
            ->make([
                'course_id' => $course->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.courses.lives.store', $course),
            $data
        );

        $this->assertDatabaseHas('lives', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $live = Live::latest('id')->first();

        $this->assertEquals($course->id, $live->course_id);
    }
}
