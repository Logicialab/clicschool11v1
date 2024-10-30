<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\FormationDetail;

use App\Models\Formation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationDetailControllerTest extends TestCase
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
    public function it_displays_index_view_with_formation_details(): void
    {
        $formationDetails = FormationDetail::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('formation-details.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.formation_details.index')
            ->assertViewHas('formationDetails');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_formation_detail(): void
    {
        $response = $this->get(route('formation-details.create'));

        $response->assertOk()->assertViewIs('backend.formation_details.create');
    }

    /**
     * @test
     */
    public function it_stores_the_formation_detail(): void
    {
        $data = FormationDetail::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('formation-details.store'), $data);

        $this->assertDatabaseHas('formation_details', $data);

        $formationDetail = FormationDetail::latest('id')->first();

        $response->assertRedirect(
            route('formation-details.edit', $formationDetail)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_formation_detail(): void
    {
        $formationDetail = FormationDetail::factory()->create();

        $response = $this->get(
            route('formation-details.show', $formationDetail)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.formation_details.show')
            ->assertViewHas('formationDetail');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_formation_detail(): void
    {
        $formationDetail = FormationDetail::factory()->create();

        $response = $this->get(
            route('formation-details.edit', $formationDetail)
        );

        $response
            ->assertOk()
            ->assertViewIs('backend.formation_details.edit')
            ->assertViewHas('formationDetail');
    }

    /**
     * @test
     */
    public function it_updates_the_formation_detail(): void
    {
        $formationDetail = FormationDetail::factory()->create();

        $formation = Formation::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'url' => $this->faker->url(),
            'description' => $this->faker->sentence(15),
            'formation_id' => $formation->id,
        ];

        $response = $this->put(
            route('formation-details.update', $formationDetail),
            $data
        );

        $data['id'] = $formationDetail->id;

        $this->assertDatabaseHas('formation_details', $data);

        $response->assertRedirect(
            route('formation-details.edit', $formationDetail)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_formation_detail(): void
    {
        $formationDetail = FormationDetail::factory()->create();

        $response = $this->delete(
            route('formation-details.destroy', $formationDetail)
        );

        $response->assertRedirect(route('formation-details.index'));

        $this->assertModelMissing($formationDetail);
    }
}
