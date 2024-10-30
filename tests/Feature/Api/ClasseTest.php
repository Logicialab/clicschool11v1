<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Classe;

use App\Models\Level;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClasseTest extends TestCase
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
    public function it_gets_classes_list(): void
    {
        $classes = Classe::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.classes.index'));

        $response->assertOk()->assertSee($classes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_classe(): void
    {
        $data = Classe::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.classes.store'), $data);

        $this->assertDatabaseHas('classes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_classe(): void
    {
        $classe = Classe::factory()->create();

        $level = Level::factory()->create();

        $data = [
            'name' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'annee_scolaire' => $this->faker->text(255),
            'level_id' => $level->id,
        ];

        $response = $this->putJson(route('api.classes.update', $classe), $data);

        $data['id'] = $classe->id;

        $this->assertDatabaseHas('classes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_classe(): void
    {
        $classe = Classe::factory()->create();

        $response = $this->deleteJson(route('api.classes.destroy', $classe));

        $this->assertModelMissing($classe);

        $response->assertNoContent();
    }
}
