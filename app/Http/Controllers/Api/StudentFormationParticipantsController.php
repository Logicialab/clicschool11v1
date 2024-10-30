<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormationParticipantResource;
use App\Http\Resources\FormationParticipantCollection;

class StudentFormationParticipantsController extends Controller
{
    public function index(
        Request $request,
        Student $student
    ): FormationParticipantCollection {
        $this->authorize('view', $student);

        $search = $request->get('search', '');

        $formationParticipants = $student
            ->formationParticipants()
            ->search($search)
            ->latest()
            ->paginate();

        return new FormationParticipantCollection($formationParticipants);
    }

    public function store(
        Request $request,
        Student $student
    ): FormationParticipantResource {
        $this->authorize('create', FormationParticipant::class);

        $validated = $request->validate([
            'formation_id' => ['required', 'exists:formations,id'],
            'time' => ['nullable', 'max:255', 'string'],
        ]);

        $formationParticipant = $student
            ->formationParticipants()
            ->create($validated);

        return new FormationParticipantResource($formationParticipant);
    }
}
