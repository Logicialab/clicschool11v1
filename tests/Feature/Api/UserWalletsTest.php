<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Wallet;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserWalletsTest extends TestCase
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
    public function it_gets_user_wallets(): void
    {
        $user = User::factory()->create();
        $wallets = Wallet::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.wallets.index', $user));

        $response->assertOk()->assertSee($wallets[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_user_wallets(): void
    {
        $user = User::factory()->create();
        $data = Wallet::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.wallets.store', $user),
            $data
        );

        $this->assertDatabaseHas('wallets', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $wallet = Wallet::latest('id')->first();

        $this->assertEquals($user->id, $wallet->user_id);
    }
}
