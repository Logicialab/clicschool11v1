<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Plan;
use App\Models\Subscription;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlanSubscriptionsTest extends TestCase
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
    public function it_gets_plan_subscriptions(): void
    {
        $plan = Plan::factory()->create();
        $subscriptions = Subscription::factory()
            ->count(2)
            ->create([
                'plan_id' => $plan->id,
            ]);

        $response = $this->getJson(
            route('api.plans.subscriptions.index', $plan)
        );

        $response->assertOk()->assertSee($subscriptions[0]->start_date);
    }

    /**
     * @test
     */
    public function it_stores_the_plan_subscriptions(): void
    {
        $plan = Plan::factory()->create();
        $data = Subscription::factory()
            ->make([
                'plan_id' => $plan->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.plans.subscriptions.store', $plan),
            $data
        );

        $this->assertDatabaseHas('subscriptions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $subscription = Subscription::latest('id')->first();

        $this->assertEquals($plan->id, $subscription->plan_id);
    }
}
