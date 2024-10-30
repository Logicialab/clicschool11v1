<?php

namespace App\Http\Controllers\Backend;

use App\Models\Teacher;
use App\Models\Formation;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\FormationType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\FormationStoreRequest;
use App\Http\Requests\Backend\FormationUpdateRequest;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Formation::class);

        $search = $request->get('search', '');

        $formations = Formation::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.formations.index',
            compact('formations', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Formation::class);

        $formationTypes = FormationType::pluck('name', 'id');
        $teachers = Teacher::pluck('first_name', 'id');

        return view(
            'backend.formations.create',
            compact('formationTypes', 'teachers')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormationStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Formation::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $formation = Formation::create($validated);

        return redirect()
            ->route('formations.edit', $formation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Formation $formation): View
    {
        $this->authorize('view', $formation);

        return view('backend.formations.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Formation $formation): View
    {
        $this->authorize('update', $formation);

        $formationTypes = FormationType::pluck('name', 'id');
        $teachers = Teacher::pluck('first_name', 'id');

        return view(
            'backend.formations.edit',
            compact('formation', 'formationTypes', 'teachers')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FormationUpdateRequest $request,
        Formation $formation
    ): RedirectResponse {
        $this->authorize('update', $formation);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($formation->image) {
                Storage::delete($formation->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $formation->update($validated);

        return redirect()
            ->route('formations.edit', $formation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Formation $formation
    ): RedirectResponse {
        $this->authorize('delete', $formation);

        if ($formation->image) {
            Storage::delete($formation->image);
        }

        $formation->delete();

        return redirect()
            ->route('formations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
