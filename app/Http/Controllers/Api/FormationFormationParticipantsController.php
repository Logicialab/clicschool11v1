<?php

namespace App\Http\Controllers\Api;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormationParticipantResource;
use App\Http\Resources\FormationParticipantCollection;

class FormationFormationParticipantsController extends Controller
{
    public function index(
        Request $request,
        Formation $formation
    ): FormationParticipantCollection {
        $this->authorize('view', $formation);

        $search = $request->get('search', '');

        $formationParticipants = $formation
            ->formationParticipants()
            ->search($search)
            ->latest()
            ->paginate();

        return new FormationParticipantCollection($formationParticipants);
    }

    public function store(
        Request $request,
        Formation $formation
    ): FormationParticipantResource {
        $this->authorize('create', FormationParticipant::class);

        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'time' => ['nullable', 'max:255', 'string'],
        ]);

        $formationParticipant = $formation
            ->formationParticipants()
            ->create($validated);

        return new FormationParticipantResource($formationParticipant);
    }
}
