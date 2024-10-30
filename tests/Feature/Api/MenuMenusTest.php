<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Menu;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuMenusTest extends TestCase
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
    public function it_gets_menu_menus(): void
    {
        $menu = Menu::factory()->create();
        $menus = Menu::factory()
            ->count(2)
            ->create([
                'menu_id' => $menu->id,
            ]);

        $response = $this->getJson(route('api.menus.menus.index', $menu));

        $response->assertOk()->assertSee($menus[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_menu_menus(): void
    {
        $menu = Menu::factory()->create();
        $data = Menu::factory()
            ->make([
                'menu_id' => $menu->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.menus.menus.store', $menu),
            $data
        );

        $this->assertDatabaseHas('menus', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $menu = Menu::latest('id')->first();

        $this->assertEquals($menu->id, $menu->menu_id);
    }
}
