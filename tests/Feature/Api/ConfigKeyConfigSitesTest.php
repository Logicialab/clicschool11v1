<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ConfigKey;
use App\Models\ConfigSite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfigKeyConfigSitesTest extends TestCase
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
    public function it_gets_config_key_config_sites(): void
    {
        $configKey = ConfigKey::factory()->create();
        $configSites = ConfigSite::factory()
            ->count(2)
            ->create([
                'config_key_id' => $configKey->id,
            ]);

        $response = $this->getJson(
            route('api.config-keys.config-sites.index', $configKey)
        );

        $response->assertOk()->assertSee($configSites[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_config_key_config_sites(): void
    {
        $configKey = ConfigKey::factory()->create();
        $data = ConfigSite::factory()
            ->make([
                'config_key_id' => $configKey->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.config-keys.config-sites.store', $configKey),
            $data
        );

        $this->assertDatabaseHas('config_sites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $configSite = ConfigSite::latest('id')->first();

        $this->assertEquals($configKey->id, $configSite->config_key_id);
    }
}
