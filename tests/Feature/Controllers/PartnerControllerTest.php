<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Partner;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PartnerControllerTest extends TestCase
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
    public function it_displays_index_view_with_partners(): void
    {
        $partners = Partner::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('partners.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.partners.index')
            ->assertViewHas('partners');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_partner(): void
    {
        $response = $this->get(route('partners.create'));

        $response->assertOk()->assertViewIs('backend.partners.create');
    }

    /**
     * @test
     */
    public function it_stores_the_partner(): void
    {
        $data = Partner::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('partners.store'), $data);

        $this->assertDatabaseHas('partners', $data);

        $partner = Partner::latest('id')->first();

        $response->assertRedirect(route('partners.edit', $partner));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_partner(): void
    {
        $partner = Partner::factory()->create();

        $response = $this->get(route('partners.show', $partner));

        $response
            ->assertOk()
            ->assertViewIs('backend.partners.show')
            ->assertViewHas('partner');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_partner(): void
    {
        $partner = Partner::factory()->create();

        $response = $this->get(route('partners.edit', $partner));

        $response
            ->assertOk()
            ->assertViewIs('backend.partners.edit')
            ->assertViewHas('partner');
    }

    /**
     * @test
     */
    public function it_updates_the_partner(): void
    {
        $partner = Partner::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'active' => $this->faker->boolean(),
            'description' => $this->faker->sentence(15),
            'content' => $this->faker->text(),
            'url' => $this->faker->url(),
        ];

        $response = $this->put(route('partners.update', $partner), $data);

        $data['id'] = $partner->id;

        $this->assertDatabaseHas('partners', $data);

        $response->assertRedirect(route('partners.edit', $partner));
    }

    /**
     * @test
     */
    public function it_deletes_the_partner(): void
    {
        $partner = Partner::factory()->create();

        $response = $this->delete(route('partners.destroy', $partner));

        $response->assertRedirect(route('partners.index'));

        $this->assertModelMissing($partner);
    }
}
