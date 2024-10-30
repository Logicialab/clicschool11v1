<?php

namespace App\Http\Controllers\Backend;

use App\Models\Plan;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\SubscriptionStoreRequest;
use App\Http\Requests\Backend\SubscriptionUpdateRequest;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Subscription::class);

        $search = $request->get('search', '');

        $subscriptions = Subscription::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.subscriptions.index',
            compact('subscriptions', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Subscription::class);

        $plans = Plan::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('backend.subscriptions.create', compact('plans', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Subscription::class);

        $validated = $request->validated();

        $subscription = Subscription::create($validated);

        return redirect()
            ->route('subscriptions.edit', $subscription)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Subscription $subscription): View
    {
        $this->authorize('view', $subscription);

        return view('backend.subscriptions.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Subscription $subscription): View
    {
        $this->authorize('update', $subscription);

        $plans = Plan::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'backend.subscriptions.edit',
            compact('subscription', 'plans', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SubscriptionUpdateRequest $request,
        Subscription $subscription
    ): RedirectResponse {
        $this->authorize('update', $subscription);

        $validated = $request->validated();

        $subscription->update($validated);

        return redirect()
            ->route('subscriptions.edit', $subscription)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Subscription $subscription
    ): RedirectResponse {
        $this->authorize('delete', $subscription);

        $subscription->delete();

        return redirect()
            ->route('subscriptions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
