<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Plan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlanTest extends TestCase
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
    public function it_gets_plans_list(): void
    {
        $plans = Plan::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.plans.index'));

        $response->assertOk()->assertSee($plans[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_plan(): void
    {
        $data = Plan::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.plans.store'), $data);

        $this->assertDatabaseHas('plans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.plans.update', $plan), $data);

        $data['id'] = $plan->id;

        $this->assertDatabaseHas('plans', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_plan(): void
    {
        $plan = Plan::factory()->create();

        $response = $this->deleteJson(route('api.plans.destroy', $plan));

        $this->assertModelMissing($plan);

        $response->assertNoContent();
    }
}
