<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\FormationDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\FormationDetailStoreRequest;
use App\Http\Requests\Backend\FormationDetailUpdateRequest;

class FormationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', FormationDetail::class);

        $search = $request->get('search', '');

        $formationDetails = FormationDetail::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.formation_details.index',
            compact('formationDetails', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', FormationDetail::class);

        $formations = Formation::pluck('name', 'id');

        return view('backend.formation_details.create', compact('formations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        FormationDetailStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', FormationDetail::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $formationDetail = FormationDetail::create($validated);

        return redirect()
            ->route('formation-details.edit', $formationDetail)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        FormationDetail $formationDetail
    ): View {
        $this->authorize('view', $formationDetail);

        return view(
            'backend.formation_details.show',
            compact('formationDetail')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        FormationDetail $formationDetail
    ): View {
        $this->authorize('update', $formationDetail);

        $formations = Formation::pluck('name', 'id');

        return view(
            'backend.formation_details.edit',
            compact('formationDetail', 'formations')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FormationDetailUpdateRequest $request,
        FormationDetail $formationDetail
    ): RedirectResponse {
        $this->authorize('update', $formationDetail);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            if ($formationDetail->file) {
                Storage::delete($formationDetail->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $formationDetail->update($validated);

        return redirect()
            ->route('formation-details.edit', $formationDetail)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        FormationDetail $formationDetail
    ): RedirectResponse {
        $this->authorize('delete', $formationDetail);

        if ($formationDetail->file) {
            Storage::delete($formationDetail->file);
        }

        $formationDetail->delete();

        return redirect()
            ->route('formation-details.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
