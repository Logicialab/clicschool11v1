<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Plan;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlanControllerTest extends TestCase
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
    public function it_displays_index_view_with_plans(): void
    {
        $plans = Plan::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('plans.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.plans.index')
            ->assertViewHas('plans');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_plan(): void
    {
        $response = $this->get(route('plans.create'));

        $response->assertOk()->assertViewIs('backend.plans.create');
    }

    /**
     * @test
     */
    public function it_stores_the_plan(): void
    {
        $data = Plan::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('plans.store'), $data);

        $this->assertDatabaseHas('plans', $data);

        $plan = Plan::latest('id')->first();

        $response->assertRedirect(route('plans.edit', $plan));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_plan(): void
    {
        $plan = Plan::factory()->create();

        $response = $this->get(route('plans.show', $plan));

        $response
            ->assertOk()
            ->assertViewIs('backend.plans.show')
            ->assertViewHas('plan');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_plan(): void
    {
        $plan = Plan::factory()->create();

        $response = $this->get(route('plans.edit', $plan));

        $response
            ->assertOk()
            ->assertViewIs('backend.plans.edit')
            ->assertViewHas('plan');
    }

    /**
     * @test
     */
    public function it_updates_the_plan(): void
    {
        $plan = Plan::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'duration' => $this->faker->randomNumber(0),
        ];

        $response = $this->put(route('plans.update', $plan), $data);

        $data['id'] = $plan->id;

        $this->assertDatabaseHas('plans', $data);

        $response->assertRedirect(route('plans.edit', $plan));
    }

    /**
     * @test
     */
    public function it_deletes_the_plan(): void
    {
        $plan = Plan::factory()->create();

        $response = $this->delete(route('plans.destroy', $plan));

        $response->assertRedirect(route('plans.index'));

        $this->assertModelMissing($plan);
    }
}
