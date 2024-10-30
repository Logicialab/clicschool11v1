<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Parente;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParenteControllerTest extends TestCase
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
    public function it_displays_index_view_with_parentes(): void
    {
        $parentes = Parente::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('parentes.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.parentes.index')
            ->assertViewHas('parentes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_parente(): void
    {
        $response = $this->get(route('parentes.create'));

        $response->assertOk()->assertViewIs('backend.parentes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_parente(): void
    {
        $data = Parente::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('parentes.store'), $data);

        $this->assertDatabaseHas('parentes', $data);

        $parente = Parente::latest('id')->first();

        $response->assertRedirect(route('parentes.edit', $parente));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_parente(): void
    {
        $parente = Parente::factory()->create();

        $response = $this->get(route('parentes.show', $parente));

        $response
            ->assertOk()
            ->assertViewIs('backend.parentes.show')
            ->assertViewHas('parente');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_parente(): void
    {
        $parente = Parente::factory()->create();

        $response = $this->get(route('parentes.edit', $parente));

        $response
            ->assertOk()
            ->assertViewIs('backend.parentes.edit')
            ->assertViewHas('parente');
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

        $response = $this->put(route('parentes.update', $parente), $data);

        $data['id'] = $parente->id;

        $this->assertDatabaseHas('parentes', $data);

        $response->assertRedirect(route('parentes.edit', $parente));
    }

    /**
     * @test
     */
    public function it_deletes_the_parente(): void
    {
        $parente = Parente::factory()->create();

        $response = $this->delete(route('parentes.destroy', $parente));

        $response->assertRedirect(route('parentes.index'));

        $this->assertSoftDeleted($parente);
    }
}
