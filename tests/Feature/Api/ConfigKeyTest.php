<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ConfigKey;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfigKeyTest extends TestCase
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
    public function it_gets_config_keys_list(): void
    {
        $configKeys = ConfigKey::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.config-keys.index'));

        $response->assertOk()->assertSee($configKeys[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_config_key(): void
    {
        $data = ConfigKey::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.config-keys.store'), $data);

        $this->assertDatabaseHas('config_keys', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_config_key(): void
    {
        $configKey = ConfigKey::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'key' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.config-keys.update', $configKey),
            $data
        );

        $data['id'] = $configKey->id;

        $this->assertDatabaseHas('config_keys', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_config_key(): void
    {
        $configKey = ConfigKey::factory()->create();

        $response = $this->deleteJson(
            route('api.config-keys.destroy', $configKey)
        );

        $this->assertModelMissing($configKey);

        $response->assertNoContent();
    }
}
