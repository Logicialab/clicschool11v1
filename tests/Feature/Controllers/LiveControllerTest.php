<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Live;

use App\Models\Course;
use App\Models\Teacher;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LiveControllerTest extends TestCase
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
    public function it_displays_index_view_with_lives(): void
    {
        $lives = Live::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('lives.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.lives.index')
            ->assertViewHas('lives');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_live(): void
    {
        $response = $this->get(route('lives.create'));

        $response->assertOk()->assertViewIs('backend.lives.create');
    }

    /**
     * @test
     */
    public function it_stores_the_live(): void
    {
        $data = Live::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('lives.store'), $data);

        $this->assertDatabaseHas('lives', $data);

        $live = Live::latest('id')->first();

        $response->assertRedirect(route('lives.edit', $live));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_live(): void
    {
        $live = Live::factory()->create();

        $response = $this->get(route('lives.show', $live));

        $response
            ->assertOk()
            ->assertViewIs('backend.lives.show')
            ->assertViewHas('live');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_live(): void
    {
        $live = Live::factory()->create();

        $response = $this->get(route('lives.edit', $live));

        $response
            ->assertOk()
            ->assertViewIs('backend.lives.edit')
            ->assertViewHas('live');
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

        $response = $this->put(route('lives.update', $live), $data);

        $data['id'] = $live->id;

        $this->assertDatabaseHas('lives', $data);

        $response->assertRedirect(route('lives.edit', $live));
    }

    /**
     * @test
     */
    public function it_deletes_the_live(): void
    {
        $live = Live::factory()->create();

        $response = $this->delete(route('lives.destroy', $live));

        $response->assertRedirect(route('lives.index'));

        $this->assertModelMissing($live);
    }
}
