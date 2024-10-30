<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ConfigSite;

use App\Models\ConfigKey;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfigSiteControllerTest extends TestCase
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
    public function it_displays_index_view_with_config_sites(): void
    {
        $configSites = ConfigSite::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('config-sites.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.config_sites.index')
            ->assertViewHas('configSites');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_config_site(): void
    {
        $response = $this->get(route('config-sites.create'));

        $response->assertOk()->assertViewIs('backend.config_sites.create');
    }

    /**
     * @test
     */
    public function it_stores_the_config_site(): void
    {
        $data = ConfigSite::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('config-sites.store'), $data);

        $this->assertDatabaseHas('config_sites', $data);

        $configSite = ConfigSite::latest('id')->first();

        $response->assertRedirect(route('config-sites.edit', $configSite));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_config_site(): void
    {
        $configSite = ConfigSite::factory()->create();

        $response = $this->get(route('config-sites.show', $configSite));

        $response
            ->assertOk()
            ->assertViewIs('backend.config_sites.show')
            ->assertViewHas('configSite');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_config_site(): void
    {
        $configSite = ConfigSite::factory()->create();

        $response = $this->get(route('config-sites.edit', $configSite));

        $response
            ->assertOk()
            ->assertViewIs('backend.config_sites.edit')
            ->assertViewHas('configSite');
    }

    /**
     * @test
     */
    public function it_updates_the_config_site(): void
    {
        $configSite = ConfigSite::factory()->create();

        $configKey = ConfigKey::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'active' => $this->faker->boolean(),
            'url' => $this->faker->url(),
            'config_key_id' => $configKey->id,
        ];

        $response = $this->put(
            route('config-sites.update', $configSite),
            $data
        );

        $data['id'] = $configSite->id;

        $this->assertDatabaseHas('config_sites', $data);

        $response->assertRedirect(route('config-sites.edit', $configSite));
    }

    /**
     * @test
     */
    public function it_deletes_the_config_site(): void
    {
        $configSite = ConfigSite::factory()->create();

        $response = $this->delete(route('config-sites.destroy', $configSite));

        $response->assertRedirect(route('config-sites.index'));

        $this->assertModelMissing($configSite);
    }
}
