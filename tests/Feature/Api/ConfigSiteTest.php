<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ConfigSite;

use App\Models\ConfigKey;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfigSiteTest extends TestCase
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
    public function it_gets_config_sites_list(): void
    {
        $configSites = ConfigSite::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.config-sites.index'));

        $response->assertOk()->assertSee($configSites[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_config_site(): void
    {
        $data = ConfigSite::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.config-sites.store'), $data);

        $this->assertDatabaseHas('config_sites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.config-sites.update', $configSite),
            $data
        );

        $data['id'] = $configSite->id;

        $this->assertDatabaseHas('config_sites', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_config_site(): void
    {
        $configSite = ConfigSite::factory()->create();

        $response = $this->deleteJson(
            route('api.config-sites.destroy', $configSite)
        );

        $this->assertModelMissing($configSite);

        $response->assertNoContent();
    }
}
