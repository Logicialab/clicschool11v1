<?php

namespace App\Http\Controllers\Api;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\PlanResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlanCollection;
use App\Http\Requests\Backend\PlanStoreRequest;
use App\Http\Requests\Backend\PlanUpdateRequest;

class PlanController extends Controller
{
    public function index(Request $request): PlanCollection
    {
        $this->authorize('view-any', Plan::class);

        $search = $request->get('search', '');

        $plans = Plan::search($search)
            ->latest()
            ->paginate();

        return new PlanCollection($plans);
    }

    public function store(PlanStoreRequest $request): PlanResource
    {
        $this->authorize('create', Plan::class);

        $validated = $request->validated();

        $plan = Plan::create($validated);

        return new PlanResource($plan);
    }

    public function show(Request $request, Plan $plan): PlanResource
    {
        $this->authorize('view', $plan);

        return new PlanResource($plan);
    }

    public function update(PlanUpdateRequest $request, Plan $plan): PlanResource
    {
        $this->authorize('update', $plan);

        $validated = $request->validated();

        $plan->update($validated);

        return new PlanResource($plan);
    }

    public function destroy(Request $request, Plan $plan): Response
    {
        $this->authorize('delete', $plan);

        $plan->delete();

        return response()->noContent();
    }
}
