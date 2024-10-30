<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Level;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LevelControllerTest extends TestCase
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
    public function it_displays_index_view_with_levels(): void
    {
        $levels = Level::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('levels.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.levels.index')
            ->assertViewHas('levels');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_level(): void
    {
        $response = $this->get(route('levels.create'));

        $response->assertOk()->assertViewIs('backend.levels.create');
    }

    /**
     * @test
     */
    public function it_stores_the_level(): void
    {
        $data = Level::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('levels.store'), $data);

        $this->assertDatabaseHas('levels', $data);

        $level = Level::latest('id')->first();

        $response->assertRedirect(route('levels.edit', $level));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_level(): void
    {
        $level = Level::factory()->create();

        $response = $this->get(route('levels.show', $level));

        $response
            ->assertOk()
            ->assertViewIs('backend.levels.show')
            ->assertViewHas('level');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_level(): void
    {
        $level = Level::factory()->create();

        $response = $this->get(route('levels.edit', $level));

        $response
            ->assertOk()
            ->assertViewIs('backend.levels.edit')
            ->assertViewHas('level');
    }

    /**
     * @test
     */
    public function it_updates_the_level(): void
    {
        $level = Level::factory()->create();

        $data = [
            'name' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(route('levels.update', $level), $data);

        $data['id'] = $level->id;

        $this->assertDatabaseHas('levels', $data);

        $response->assertRedirect(route('levels.edit', $level));
    }

    /**
     * @test
     */
    public function it_deletes_the_level(): void
    {
        $level = Level::factory()->create();

        $response = $this->delete(route('levels.destroy', $level));

        $response->assertRedirect(route('levels.index'));

        $this->assertModelMissing($level);
    }
}
