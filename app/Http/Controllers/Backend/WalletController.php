<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\WalletStoreRequest;
use App\Http\Requests\Backend\WalletUpdateRequest;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Wallet::class);

        $search = $request->get('search', '');

        $wallets = Wallet::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.wallets.index', compact('wallets', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Wallet::class);

        $users = User::pluck('name', 'id');

        return view('backend.wallets.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WalletStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Wallet::class);

        $validated = $request->validated();

        $wallet = Wallet::create($validated);

        return redirect()
            ->route('wallets.edit', $wallet)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Wallet $wallet): View
    {
        $this->authorize('view', $wallet);

        return view('backend.wallets.show', compact('wallet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Wallet $wallet): View
    {
        $this->authorize('update', $wallet);

        $users = User::pluck('name', 'id');

        return view('backend.wallets.edit', compact('wallet', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        WalletUpdateRequest $request,
        Wallet $wallet
    ): RedirectResponse {
        $this->authorize('update', $wallet);

        $validated = $request->validated();

        $wallet->update($validated);

        return redirect()
            ->route('wallets.edit', $wallet)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Wallet $wallet): RedirectResponse
    {
        $this->authorize('delete', $wallet);

        $wallet->delete();

        return redirect()
            ->route('wallets.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
