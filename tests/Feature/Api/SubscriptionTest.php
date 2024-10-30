<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Subscription;

use App\Models\Plan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriptionTest extends TestCase
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
    public function it_gets_subscriptions_list(): void
    {
        $subscriptions = Subscription::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.subscriptions.index'));

        $response->assertOk()->assertSee($subscriptions[0]->start_date);
    }

    /**
     * @test
     */
    public function it_stores_the_subscription(): void
    {
        $data = Subscription::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.subscriptions.store'), $data);

        $this->assertDatabaseHas('subscriptions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_subscription(): void
    {
        $subscription = Subscription::factory()->create();

        $plan = Plan::factory()->create();
        $user = User::factory()->create();

        $data = [
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'status' => $this->faker->word(),
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.subscriptions.update', $subscription),
            $data
        );

        $data['id'] = $subscription->id;

        $this->assertDatabaseHas('subscriptions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_subscription(): void
    {
        $subscription = Subscription::factory()->create();

        $response = $this->deleteJson(
            route('api.subscriptions.destroy', $subscription)
        );

        $this->assertModelMissing($subscription);

        $response->assertNoContent();
    }
}
