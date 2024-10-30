<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Competition;

use App\Models\Classe;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetitionControllerTest extends TestCase
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
    public function it_displays_index_view_with_competitions(): void
    {
        $competitions = Competition::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('competitions.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.competitions.index')
            ->assertViewHas('competitions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_competition(): void
    {
        $response = $this->get(route('competitions.create'));

        $response->assertOk()->assertViewIs('backend.competitions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_competition(): void
    {
        $data = Competition::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('competitions.store'), $data);

        $this->assertDatabaseHas('competitions', $data);

        $competition = Competition::latest('id')->first();

        $response->assertRedirect(route('competitions.edit', $competition));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_competition(): void
    {
        $competition = Competition::factory()->create();

        $response = $this->get(route('competitions.show', $competition));

        $response
            ->assertOk()
            ->assertViewIs('backend.competitions.show')
            ->assertViewHas('competition');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_competition(): void
    {
        $competition = Competition::factory()->create();

        $response = $this->get(route('competitions.edit', $competition));

        $response
            ->assertOk()
            ->assertViewIs('backend.competitions.edit')
            ->assertViewHas('competition');
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

        $response = $this->put(
            route('competitions.update', $competition),
            $data
        );

        $data['id'] = $competition->id;

        $this->assertDatabaseHas('competitions', $data);

        $response->assertRedirect(route('competitions.edit', $competition));
    }

    /**
     * @test
     */
    public function it_deletes_the_competition(): void
    {
        $competition = Competition::factory()->create();

        $response = $this->delete(route('competitions.destroy', $competition));

        $response->assertRedirect(route('competitions.index'));

        $this->assertModelMissing($competition);
    }
}
