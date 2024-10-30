<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ConfigKey;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfigKeyControllerTest extends TestCase
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
    public function it_displays_index_view_with_config_keys(): void
    {
        $configKeys = ConfigKey::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('config-keys.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.config_keys.index')
            ->assertViewHas('configKeys');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_config_key(): void
    {
        $response = $this->get(route('config-keys.create'));

        $response->assertOk()->assertViewIs('backend.config_keys.create');
    }

    /**
     * @test
     */
    public function it_stores_the_config_key(): void
    {
        $data = ConfigKey::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('config-keys.store'), $data);

        $this->assertDatabaseHas('config_keys', $data);

        $configKey = ConfigKey::latest('id')->first();

        $response->assertRedirect(route('config-keys.edit', $configKey));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_config_key(): void
    {
        $configKey = ConfigKey::factory()->create();

        $response = $this->get(route('config-keys.show', $configKey));

        $response
            ->assertOk()
            ->assertViewIs('backend.config_keys.show')
            ->assertViewHas('configKey');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_config_key(): void
    {
        $configKey = ConfigKey::factory()->create();

        $response = $this->get(route('config-keys.edit', $configKey));

        $response
            ->assertOk()
            ->assertViewIs('backend.config_keys.edit')
            ->assertViewHas('configKey');
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

        $response = $this->put(route('config-keys.update', $configKey), $data);

        $data['id'] = $configKey->id;

        $this->assertDatabaseHas('config_keys', $data);

        $response->assertRedirect(route('config-keys.edit', $configKey));
    }

    /**
     * @test
     */
    public function it_deletes_the_config_key(): void
    {
        $configKey = ConfigKey::factory()->create();

        $response = $this->delete(route('config-keys.destroy', $configKey));

        $response->assertRedirect(route('config-keys.index'));

        $this->assertModelMissing($configKey);
    }
}
