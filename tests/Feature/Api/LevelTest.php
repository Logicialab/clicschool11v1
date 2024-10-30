<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Level;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LevelTest extends TestCase
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
    public function it_gets_levels_list(): void
    {
        $levels = Level::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.levels.index'));

        $response->assertOk()->assertSee($levels[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_level(): void
    {
        $data = Level::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.levels.store'), $data);

        $this->assertDatabaseHas('levels', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.levels.update', $level), $data);

        $data['id'] = $level->id;

        $this->assertDatabaseHas('levels', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_level(): void
    {
        $level = Level::factory()->create();

        $response = $this->deleteJson(route('api.levels.destroy', $level));

        $this->assertModelMissing($level);

        $response->assertNoContent();
    }
}
