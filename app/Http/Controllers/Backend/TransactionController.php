<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\TransactionStoreRequest;
use App\Http\Requests\Backend\TransactionUpdateRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Transaction::class);

        $search = $request->get('search', '');

        $transactions = Transaction::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.transactions.index',
            compact('transactions', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Transaction::class);

        $users = User::pluck('name', 'id');

        return view('backend.transactions.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Transaction::class);

        $validated = $request->validated();

        $transaction = Transaction::create($validated);

        return redirect()
            ->route('transactions.edit', $transaction)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Transaction $transaction): View
    {
        $this->authorize('view', $transaction);

        return view('backend.transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Transaction $transaction): View
    {
        $this->authorize('update', $transaction);

        $users = User::pluck('name', 'id');

        return view(
            'backend.transactions.edit',
            compact('transaction', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TransactionUpdateRequest $request,
        Transaction $transaction
    ): RedirectResponse {
        $this->authorize('update', $transaction);

        $validated = $request->validated();

        $transaction->update($validated);

        return redirect()
            ->route('transactions.edit', $transaction)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Transaction $transaction
    ): RedirectResponse {
        $this->authorize('delete', $transaction);

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
