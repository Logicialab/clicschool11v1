<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WalletResource;
use App\Http\Resources\WalletCollection;

class UserWalletsController extends Controller
{
    public function index(Request $request, User $user): WalletCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $wallets = $user
            ->wallets()
            ->search($search)
            ->latest()
            ->paginate();

        return new WalletCollection($wallets);
    }

    public function store(Request $request, User $user): WalletResource
    {
        $this->authorize('create', Wallet::class);

        $validated = $request->validate([
            'balance' => ['required', 'numeric'],
        ]);

        $wallet = $user->wallets()->create($validated);

        return new WalletResource($wallet);
    }
}
