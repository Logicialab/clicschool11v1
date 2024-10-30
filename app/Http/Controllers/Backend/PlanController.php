<?php

namespace App\Http\Controllers\Backend;

use App\Models\Plan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\PlanStoreRequest;
use App\Http\Requests\Backend\PlanUpdateRequest;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Plan::class);

        $search = $request->get('search', '');

        $plans = Plan::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.plans.index', compact('plans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Plan::class);

        return view('backend.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Plan::class);

        $validated = $request->validated();

        $plan = Plan::create($validated);

        return redirect()
            ->route('plans.edit', $plan)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Plan $plan): View
    {
        $this->authorize('view', $plan);

        return view('backend.plans.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Plan $plan): View
    {
        $this->authorize('update', $plan);

        return view('backend.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PlanUpdateRequest $request,
        Plan $plan
    ): RedirectResponse {
        $this->authorize('update', $plan);

        $validated = $request->validated();

        $plan->update($validated);

        return redirect()
            ->route('plans.edit', $plan)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Plan $plan): RedirectResponse
    {
        $this->authorize('delete', $plan);

        $plan->delete();

        return redirect()
            ->route('plans.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
