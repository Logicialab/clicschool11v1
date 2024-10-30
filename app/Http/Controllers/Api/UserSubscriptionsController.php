<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriptionResource;
use App\Http\Resources\SubscriptionCollection;

class UserSubscriptionsController extends Controller
{
    public function index(Request $request, User $user): SubscriptionCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $subscriptions = $user
            ->subscriptions()
            ->search($search)
            ->latest()
            ->paginate();

        return new SubscriptionCollection($subscriptions);
    }

    public function store(Request $request, User $user): SubscriptionResource
    {
        $this->authorize('create', Subscription::class);

        $validated = $request->validate([
            'plan_id' => ['required', 'exists:plans,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'status' => ['nullable', 'max:255', 'string'],
        ]);

        $subscription = $user->subscriptions()->create($validated);

        return new SubscriptionResource($subscription);
    }
}
