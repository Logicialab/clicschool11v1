<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\FormationType;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\FormationTypeStoreRequest;
use App\Http\Requests\Backend\FormationTypeUpdateRequest;

class FormationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', FormationType::class);

        $search = $request->get('search', '');

        $formationTypes = FormationType::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.formation_types.index',
            compact('formationTypes', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', FormationType::class);

        return view('backend.formation_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormationTypeStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', FormationType::class);

        $validated = $request->validated();

        $formationType = FormationType::create($validated);

        return redirect()
            ->route('formation-types.edit', $formationType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, FormationType $formationType): View
    {
        $this->authorize('view', $formationType);

        return view('backend.formation_types.show', compact('formationType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, FormationType $formationType): View
    {
        $this->authorize('update', $formationType);

        return view('backend.formation_types.edit', compact('formationType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FormationTypeUpdateRequest $request,
        FormationType $formationType
    ): RedirectResponse {
        $this->authorize('update', $formationType);

        $validated = $request->validated();

        $formationType->update($validated);

        return redirect()
            ->route('formation-types.edit', $formationType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        FormationType $formationType
    ): RedirectResponse {
        $this->authorize('delete', $formationType);

        $formationType->delete();

        return redirect()
            ->route('formation-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
