<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Wallet;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WalletTest extends TestCase
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
    public function it_gets_wallets_list(): void
    {
        $wallets = Wallet::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.wallets.index'));

        $response->assertOk()->assertSee($wallets[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_wallet(): void
    {
        $data = Wallet::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.wallets.store'), $data);

        $this->assertDatabaseHas('wallets', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_wallet(): void
    {
        $wallet = Wallet::factory()->create();

        $user = User::factory()->create();

        $data = [
            'balance' => $this->faker->randomNumber(1),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(route('api.wallets.update', $wallet), $data);

        $data['id'] = $wallet->id;

        $this->assertDatabaseHas('wallets', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_wallet(): void
    {
        $wallet = Wallet::factory()->create();

        $response = $this->deleteJson(route('api.wallets.destroy', $wallet));

        $this->assertModelMissing($wallet);

        $response->assertNoContent();
    }
}
