<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Parente;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserParentesTest extends TestCase
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
    public function it_gets_user_parentes(): void
    {
        $user = User::factory()->create();
        $parentes = Parente::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.parentes.index', $user));

        $response->assertOk()->assertSee($parentes[0]->first_name);
    }

    /**
     * @test
     */
    public function it_stores_the_user_parentes(): void
    {
        $user = User::factory()->create();
        $data = Parente::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.parentes.store', $user),
            $data
        );

        $this->assertDatabaseHas('parentes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $parente = Parente::latest('id')->first();

        $this->assertEquals($user->id, $parente->user_id);
    }
}
