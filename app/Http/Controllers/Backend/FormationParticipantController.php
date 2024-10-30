<?php

namespace App\Http\Controllers\Backend;

use App\Models\Student;
use Illuminate\View\View;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\FormationParticipant;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\FormationParticipantStoreRequest;
use App\Http\Requests\Backend\FormationParticipantUpdateRequest;

class FormationParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', FormationParticipant::class);

        $search = $request->get('search', '');

        $formationParticipants = FormationParticipant::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.formation_participants.index',
            compact('formationParticipants', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', FormationParticipant::class);

        $formations = Formation::pluck('name', 'id');
        $students = Student::pluck('first_name', 'id');

        return view(
            'backend.formation_participants.create',
            compact('formations', 'students')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        FormationParticipantStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', FormationParticipant::class);

        $validated = $request->validated();

        $formationParticipant = FormationParticipant::create($validated);

        return redirect()
            ->route('formation-participants.edit', $formationParticipant)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        FormationParticipant $formationParticipant
    ): View {
        $this->authorize('view', $formationParticipant);

        return view(
            'backend.formation_participants.show',
            compact('formationParticipant')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        FormationParticipant $formationParticipant
    ): View {
        $this->authorize('update', $formationParticipant);

        $formations = Formation::pluck('name', 'id');
        $students = Student::pluck('first_name', 'id');

        return view(
            'backend.formation_participants.edit',
            compact('formationParticipant', 'formations', 'students')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FormationParticipantUpdateRequest $request,
        FormationParticipant $formationParticipant
    ): RedirectResponse {
        $this->authorize('update', $formationParticipant);

        $validated = $request->validated();

        $formationParticipant->update($validated);

        return redirect()
            ->route('formation-participants.edit', $formationParticipant)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        FormationParticipant $formationParticipant
    ): RedirectResponse {
        $this->authorize('delete', $formationParticipant);

        $formationParticipant->delete();

        return redirect()
            ->route('formation-participants.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
