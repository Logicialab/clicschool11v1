<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Parente;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParenteTest extends TestCase
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
    public function it_gets_parentes_list(): void
    {
        $parentes = Parente::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.parentes.index'));

        $response->assertOk()->assertSee($parentes[0]->first_name);
    }

    /**
     * @test
     */
    public function it_stores_the_parente(): void
    {
        $data = Parente::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.parentes.store'), $data);

        $this->assertDatabaseHas('parentes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_parente(): void
    {
        $parente = Parente::factory()->create();

        $user = User::factory()->create();

        $data = [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.parentes.update', $parente),
            $data
        );

        $data['id'] = $parente->id;

        $this->assertDatabaseHas('parentes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_parente(): void
    {
        $parente = Parente::factory()->create();

        $response = $this->deleteJson(route('api.parentes.destroy', $parente));

        $this->assertSoftDeleted($parente);

        $response->assertNoContent();
    }
}
