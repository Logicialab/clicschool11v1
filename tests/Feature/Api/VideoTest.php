<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Video;

use App\Models\Course;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoTest extends TestCase
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
    public function it_gets_videos_list(): void
    {
        $videos = Video::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.videos.index'));

        $response->assertOk()->assertSee($videos[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_video(): void
    {
        $data = Video::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.videos.store'), $data);

        $this->assertDatabaseHas('videos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_video(): void
    {
        $video = Video::factory()->create();

        $course = Course::factory()->create();

        $data = [
            'url' => $this->faker->url(),
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'active' => $this->faker->boolean(),
            'course_id' => $course->id,
        ];

        $response = $this->putJson(route('api.videos.update', $video), $data);

        $data['id'] = $video->id;

        $this->assertDatabaseHas('videos', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_video(): void
    {
        $video = Video::factory()->create();

        $response = $this->deleteJson(route('api.videos.destroy', $video));

        $this->assertModelMissing($video);

        $response->assertNoContent();
    }
}
