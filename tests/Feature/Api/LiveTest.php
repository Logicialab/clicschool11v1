<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Live;

use App\Models\Course;
use App\Models\Teacher;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LiveTest extends TestCase
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
    public function it_gets_lives_list(): void
    {
        $lives = Live::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.lives.index'));

        $response->assertOk()->assertSee($lives[0]->url);
    }

    /**
     * @test
     */
    public function it_stores_the_live(): void
    {
        $data = Live::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.lives.store'), $data);

        $this->assertDatabaseHas('lives', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_live(): void
    {
        $live = Live::factory()->create();

        $course = Course::factory()->create();
        $teacher = Teacher::factory()->create();

        $data = [
            'url' => $this->faker->url(),
            'scheduled_at' => $this->faker->dateTime(),
            'duration' => $this->faker->randomNumber(0),
            'active' => $this->faker->boolean(),
            'course_id' => $course->id,
            'teacher_id' => $teacher->id,
        ];

        $response = $this->putJson(route('api.lives.update', $live), $data);

        $data['id'] = $live->id;

        $this->assertDatabaseHas('lives', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_live(): void
    {
        $live = Live::factory()->create();

        $response = $this->deleteJson(route('api.lives.destroy', $live));

        $this->assertModelMissing($live);

        $response->assertNoContent();
    }
}
