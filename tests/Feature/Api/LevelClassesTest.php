<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Level;
use App\Models\Classe;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LevelClassesTest extends TestCase
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
    public function it_gets_level_classes(): void
    {
        $level = Level::factory()->create();
        $classes = Classe::factory()
            ->count(2)
            ->create([
                'level_id' => $level->id,
            ]);

        $response = $this->getJson(route('api.levels.classes.index', $level));

        $response->assertOk()->assertSee($classes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_level_classes(): void
    {
        $level = Level::factory()->create();
        $data = Classe::factory()
            ->make([
                'level_id' => $level->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.levels.classes.store', $level),
            $data
        );

        $this->assertDatabaseHas('classes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $classe = Classe::latest('id')->first();

        $this->assertEquals($level->id, $classe->level_id);
    }
}
