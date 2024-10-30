<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Classe;

use App\Models\Level;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClasseControllerTest extends TestCase
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
    public function it_displays_index_view_with_classes(): void
    {
        $classes = Classe::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('classes.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.classes.index')
            ->assertViewHas('classes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_classe(): void
    {
        $response = $this->get(route('classes.create'));

        $response->assertOk()->assertViewIs('backend.classes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_classe(): void
    {
        $data = Classe::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('classes.store'), $data);

        $this->assertDatabaseHas('classes', $data);

        $classe = Classe::latest('id')->first();

        $response->assertRedirect(route('classes.edit', $classe));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_classe(): void
    {
        $classe = Classe::factory()->create();

        $response = $this->get(route('classes.show', $classe));

        $response
            ->assertOk()
            ->assertViewIs('backend.classes.show')
            ->assertViewHas('classe');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_classe(): void
    {
        $classe = Classe::factory()->create();

        $response = $this->get(route('classes.edit', $classe));

        $response
            ->assertOk()
            ->assertViewIs('backend.classes.edit')
            ->assertViewHas('classe');
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

        $response = $this->put(route('classes.update', $classe), $data);

        $data['id'] = $classe->id;

        $this->assertDatabaseHas('classes', $data);

        $response->assertRedirect(route('classes.edit', $classe));
    }

    /**
     * @test
     */
    public function it_deletes_the_classe(): void
    {
        $classe = Classe::factory()->create();

        $response = $this->delete(route('classes.destroy', $classe));

        $response->assertRedirect(route('classes.index'));

        $this->assertModelMissing($classe);
    }
}
