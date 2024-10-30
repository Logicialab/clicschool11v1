<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\FormationParticipant;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormationParticipantResource;
use App\Http\Resources\FormationParticipantCollection;
use App\Http\Requests\Backend\FormationParticipantStoreRequest;
use App\Http\Requests\Backend\FormationParticipantUpdateRequest;

class FormationParticipantController extends Controller
{
    public function index(Request $request): FormationParticipantCollection
    {
        $this->authorize('view-any', FormationParticipant::class);

        $search = $request->get('search', '');

        $formationParticipants = FormationParticipant::search($search)
            ->latest()
            ->paginate();

        return new FormationParticipantCollection($formationParticipants);
    }

    public function store(
        FormationParticipantStoreRequest $request
    ): FormationParticipantResource {
        $this->authorize('create', FormationParticipant::class);

        $validated = $request->validated();

        $formationParticipant = FormationParticipant::create($validated);

        return new FormationParticipantResource($formationParticipant);
    }

    public function show(
        Request $request,
        FormationParticipant $formationParticipant
    ): FormationParticipantResource {
        $this->authorize('view', $formationParticipant);

        return new FormationParticipantResource($formationParticipant);
    }

    public function update(
        FormationParticipantUpdateRequest $request,
        FormationParticipant $formationParticipant
    ): FormationParticipantResource {
        $this->authorize('update', $formationParticipant);

        $validated = $request->validated();

        $formationParticipant->update($validated);

        return new FormationParticipantResource($formationParticipant);
    }

    public function destroy(
        Request $request,
        FormationParticipant $formationParticipant
    ): Response {
        $this->authorize('delete', $formationParticipant);

        $formationParticipant->delete();

        return response()->noContent();
    }
}
