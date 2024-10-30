<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Wallet;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WalletControllerTest extends TestCase
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
    public function it_displays_index_view_with_wallets(): void
    {
        $wallets = Wallet::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('wallets.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.wallets.index')
            ->assertViewHas('wallets');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_wallet(): void
    {
        $response = $this->get(route('wallets.create'));

        $response->assertOk()->assertViewIs('backend.wallets.create');
    }

    /**
     * @test
     */
    public function it_stores_the_wallet(): void
    {
        $data = Wallet::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('wallets.store'), $data);

        $this->assertDatabaseHas('wallets', $data);

        $wallet = Wallet::latest('id')->first();

        $response->assertRedirect(route('wallets.edit', $wallet));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_wallet(): void
    {
        $wallet = Wallet::factory()->create();

        $response = $this->get(route('wallets.show', $wallet));

        $response
            ->assertOk()
            ->assertViewIs('backend.wallets.show')
            ->assertViewHas('wallet');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_wallet(): void
    {
        $wallet = Wallet::factory()->create();

        $response = $this->get(route('wallets.edit', $wallet));

        $response
            ->assertOk()
            ->assertViewIs('backend.wallets.edit')
            ->assertViewHas('wallet');
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

        $response = $this->put(route('wallets.update', $wallet), $data);

        $data['id'] = $wallet->id;

        $this->assertDatabaseHas('wallets', $data);

        $response->assertRedirect(route('wallets.edit', $wallet));
    }

    /**
     * @test
     */
    public function it_deletes_the_wallet(): void
    {
        $wallet = Wallet::factory()->create();

        $response = $this->delete(route('wallets.destroy', $wallet));

        $response->assertRedirect(route('wallets.index'));

        $this->assertModelMissing($wallet);
    }
}
