<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Formation;

use App\Models\Teacher;
use App\Models\FormationType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationControllerTest extends TestCase
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
    public function it_displays_index_view_with_formations(): void
    {
        $formations = Formation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('formations.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.formations.index')
            ->assertViewHas('formations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_formation(): void
    {
        $response = $this->get(route('formations.create'));

        $response->assertOk()->assertViewIs('backend.formations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_formation(): void
    {
        $data = Formation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('formations.store'), $data);

        $this->assertDatabaseHas('formations', $data);

        $formation = Formation::latest('id')->first();

        $response->assertRedirect(route('formations.edit', $formation));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_formation(): void
    {
        $formation = Formation::factory()->create();

        $response = $this->get(route('formations.show', $formation));

        $response
            ->assertOk()
            ->assertViewIs('backend.formations.show')
            ->assertViewHas('formation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_formation(): void
    {
        $formation = Formation::factory()->create();

        $response = $this->get(route('formations.edit', $formation));

        $response
            ->assertOk()
            ->assertViewIs('backend.formations.edit')
            ->assertViewHas('formation');
    }

    /**
     * @test
     */
    public function it_updates_the_formation(): void
    {
        $formation = Formation::factory()->create();

        $formationType = FormationType::factory()->create();
        $teacher = Teacher::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'status' => $this->faker->word(),
            'active' => $this->faker->boolean(),
            'formation_type_id' => $formationType->id,
            'teacher_id' => $teacher->id,
        ];

        $response = $this->put(route('formations.update', $formation), $data);

        $data['id'] = $formation->id;

        $this->assertDatabaseHas('formations', $data);

        $response->assertRedirect(route('formations.edit', $formation));
    }

    /**
     * @test
     */
    public function it_deletes_the_formation(): void
    {
        $formation = Formation::factory()->create();

        $response = $this->delete(route('formations.destroy', $formation));

        $response->assertRedirect(route('formations.index'));

        $this->assertSoftDeleted($formation);
    }
}
