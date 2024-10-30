<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Formation;
use App\Models\FormationType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationTypeFormationsTest extends TestCase
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
    public function it_gets_formation_type_formations(): void
    {
        $formationType = FormationType::factory()->create();
        $formations = Formation::factory()
            ->count(2)
            ->create([
                'formation_type_id' => $formationType->id,
            ]);

        $response = $this->getJson(
            route('api.formation-types.formations.index', $formationType)
        );

        $response->assertOk()->assertSee($formations[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_formation_type_formations(): void
    {
        $formationType = FormationType::factory()->create();
        $data = Formation::factory()
            ->make([
                'formation_type_id' => $formationType->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.formation-types.formations.store', $formationType),
            $data
        );

        $this->assertDatabaseHas('formations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $formation = Formation::latest('id')->first();

        $this->assertEquals($formationType->id, $formation->formation_type_id);
    }
}
