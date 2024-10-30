<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Video;

use App\Models\Course;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoControllerTest extends TestCase
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
    public function it_displays_index_view_with_videos(): void
    {
        $videos = Video::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('videos.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.videos.index')
            ->assertViewHas('videos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_video(): void
    {
        $response = $this->get(route('videos.create'));

        $response->assertOk()->assertViewIs('backend.videos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_video(): void
    {
        $data = Video::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('videos.store'), $data);

        $this->assertDatabaseHas('videos', $data);

        $video = Video::latest('id')->first();

        $response->assertRedirect(route('videos.edit', $video));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_video(): void
    {
        $video = Video::factory()->create();

        $response = $this->get(route('videos.show', $video));

        $response
            ->assertOk()
            ->assertViewIs('backend.videos.show')
            ->assertViewHas('video');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_video(): void
    {
        $video = Video::factory()->create();

        $response = $this->get(route('videos.edit', $video));

        $response
            ->assertOk()
            ->assertViewIs('backend.videos.edit')
            ->assertViewHas('video');
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

        $response = $this->put(route('videos.update', $video), $data);

        $data['id'] = $video->id;

        $this->assertDatabaseHas('videos', $data);

        $response->assertRedirect(route('videos.edit', $video));
    }

    /**
     * @test
     */
    public function it_deletes_the_video(): void
    {
        $video = Video::factory()->create();

        $response = $this->delete(route('videos.destroy', $video));

        $response->assertRedirect(route('videos.index'));

        $this->assertModelMissing($video);
    }
}
