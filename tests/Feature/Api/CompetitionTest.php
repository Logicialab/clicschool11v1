<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Competition;

use App\Models\Classe;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetitionTest extends TestCase
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
    public function it_gets_competitions_list(): void
    {
        $competitions = Competition::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.competitions.index'));

        $response->assertOk()->assertSee($competitions[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_competition(): void
    {
        $data = Competition::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.competitions.store'), $data);

        $this->assertDatabaseHas('competitions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_competition(): void
    {
        $competition = Competition::factory()->create();

        $classe = Classe::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'date_start' => $this->faker->date(),
            'date_end' => $this->faker->date(),
            'active' => $this->faker->boolean(),
            'order' => $this->faker->randomNumber(0),
            'classe_id' => $classe->id,
        ];

        $response = $this->putJson(
            route('api.competitions.update', $competition),
            $data
        );

        $data['id'] = $competition->id;

        $this->assertDatabaseHas('competitions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_competition(): void
    {
        $competition = Competition::factory()->create();

        $response = $this->deleteJson(
            route('api.competitions.destroy', $competition)
        );

        $this->assertModelMissing($competition);

        $response->assertNoContent();
    }
}
