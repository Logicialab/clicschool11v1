<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\FormationType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_formation_types(): void
    {
        $formationTypes = FormationType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('formation-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.formation_types.index')
            ->assertViewHas('formationTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_formation_type(): void
    {
        $response = $this->get(route('formation-types.create'));

        $response->assertOk()->assertViewIs('backend.formation_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_formation_type(): void
    {
        $data = FormationType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('formation-types.store'), $data);

        $this->assertDatabaseHas('formation_types', $data);

        $formationType = FormationType::latest('id')->first();

        $response->assertRedirect(
            route('formation-types.edit', $formationType)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_formation_type(): void
    {
        $formationType = FormationType::factory()->create();

        $response = $this->get(route('formation-types.show', $formationType));

        $response
            ->assertOk()
            ->assertViewIs('backend.formation_types.show')
            ->assertViewHas('formationType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_formation_type(): void
    {
        $formationType = FormationType::factory()->create();

        $response = $this->get(route('formation-types.edit', $formationType));

        $response
            ->assertOk()
            ->assertViewIs('backend.formation_types.edit')
            ->assertViewHas('formationType');
    }

    /**
     * @test
     */
    public function it_updates_the_formation_type(): void
    {
        $formationType = FormationType::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(
            route('formation-types.update', $formationType),
            $data
        );

        $data['id'] = $formationType->id;

        $this->assertDatabaseHas('formation_types', $data);

        $response->assertRedirect(
            route('formation-types.edit', $formationType)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_formation_type(): void
    {
        $formationType = FormationType::factory()->create();

        $response = $this->delete(
            route('formation-types.destroy', $formationType)
        );

        $response->assertRedirect(route('formation-types.index'));

        $this->assertModelMissing($formationType);
    }
}
