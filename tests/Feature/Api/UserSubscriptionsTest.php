<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Subscription;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSubscriptionsTest extends TestCase
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
    public function it_gets_user_subscriptions(): void
    {
        $user = User::factory()->create();
        $subscriptions = Subscription::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.subscriptions.index', $user)
        );

        $response->assertOk()->assertSee($subscriptions[0]->start_date);
    }

    /**
     * @test
     */
    public function it_stores_the_user_subscriptions(): void
    {
        $user = User::factory()->create();
        $data = Subscription::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.subscriptions.store', $user),
            $data
        );

        $this->assertDatabaseHas('subscriptions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $subscription = Subscription::latest('id')->first();

        $this->assertEquals($user->id, $subscription->user_id);
    }
}
