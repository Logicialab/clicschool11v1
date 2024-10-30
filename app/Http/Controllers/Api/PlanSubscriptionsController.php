<?php

namespace App\Http\Controllers\Api;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriptionResource;
use App\Http\Resources\SubscriptionCollection;

class PlanSubscriptionsController extends Controller
{
    public function index(Request $request, Plan $plan): SubscriptionCollection
    {
        $this->authorize('view', $plan);

        $search = $request->get('search', '');

        $subscriptions = $plan
            ->subscriptions()
            ->search($search)
            ->latest()
            ->paginate();

        return new SubscriptionCollection($subscriptions);
    }

    public function store(Request $request, Plan $plan): SubscriptionResource
    {
        $this->authorize('create', Subscription::class);

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'status' => ['nullable', 'max:255', 'string'],
        ]);

        $subscription = $plan->subscriptions()->create($validated);

        return new SubscriptionResource($subscription);
    }
}
