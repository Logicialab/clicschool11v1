<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Classe;
use App\Models\Competition;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClasseCompetitionsTest extends TestCase
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
    public function it_gets_classe_competitions(): void
    {
        $classe = Classe::factory()->create();
        $competitions = Competition::factory()
            ->count(2)
            ->create([
                'classe_id' => $classe->id,
            ]);

        $response = $this->getJson(
            route('api.classes.competitions.index', $classe)
        );

        $response->assertOk()->assertSee($competitions[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_classe_competitions(): void
    {
        $classe = Classe::factory()->create();
        $data = Competition::factory()
            ->make([
                'classe_id' => $classe->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.classes.competitions.store', $classe),
            $data
        );

        $this->assertDatabaseHas('competitions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $competition = Competition::latest('id')->first();

        $this->assertEquals($classe->id, $competition->classe_id);
    }
}
