<?php

namespace App\Http\Controllers\Api;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\WalletResource;
use App\Http\Resources\WalletCollection;
use App\Http\Requests\Backend\WalletStoreRequest;
use App\Http\Requests\Backend\WalletUpdateRequest;

class WalletController extends Controller
{
    public function index(Request $request): WalletCollection
    {
        $this->authorize('view-any', Wallet::class);

        $search = $request->get('search', '');

        $wallets = Wallet::search($search)
            ->latest()
            ->paginate();

        return new WalletCollection($wallets);
    }

    public function store(WalletStoreRequest $request): WalletResource
    {
        $this->authorize('create', Wallet::class);

        $validated = $request->validated();

        $wallet = Wallet::create($validated);

        return new WalletResource($wallet);
    }

    public function show(Request $request, Wallet $wallet): WalletResource
    {
        $this->authorize('view', $wallet);

        return new WalletResource($wallet);
    }

    public function update(
        WalletUpdateRequest $request,
        Wallet $wallet
    ): WalletResource {
        $this->authorize('update', $wallet);

        $validated = $request->validated();

        $wallet->update($validated);

        return new WalletResource($wallet);
    }

    public function destroy(Request $request, Wallet $wallet): Response
    {
        $this->authorize('delete', $wallet);

        $wallet->delete();

        return response()->noContent();
    }
}
