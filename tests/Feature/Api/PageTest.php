<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Page;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
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
    public function it_gets_pages_list(): void
    {
        $pages = Page::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.pages.index'));

        $response->assertOk()->assertSee($pages[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_page(): void
    {
        $data = Page::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.pages.store'), $data);

        $this->assertDatabaseHas('pages', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_page(): void
    {
        $page = Page::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'content' => $this->faker->text(),
            'active' => $this->faker->boolean(),
        ];

        $response = $this->putJson(route('api.pages.update', $page), $data);

        $data['id'] = $page->id;

        $this->assertDatabaseHas('pages', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_page(): void
    {
        $page = Page::factory()->create();

        $response = $this->deleteJson(route('api.pages.destroy', $page));

        $this->assertModelMissing($page);

        $response->assertNoContent();
    }
}
