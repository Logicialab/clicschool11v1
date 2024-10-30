<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\LiveParticipant;
use App\Http\Controllers\Controller;
use App\Http\Resources\LiveParticipantResource;
use App\Http\Resources\LiveParticipantCollection;
use App\Http\Requests\Backend\LiveParticipantStoreRequest;
use App\Http\Requests\Backend\LiveParticipantUpdateRequest;

class LiveParticipantController extends Controller
{
    public function index(Request $request): LiveParticipantCollection
    {
        $this->authorize('view-any', LiveParticipant::class);

        $search = $request->get('search', '');

        $liveParticipants = LiveParticipant::search($search)
            ->latest()
            ->paginate();

        return new LiveParticipantCollection($liveParticipants);
    }

    public function store(
        LiveParticipantStoreRequest $request
    ): LiveParticipantResource {
        $this->authorize('create', LiveParticipant::class);

        $validated = $request->validated();

        $liveParticipant = LiveParticipant::create($validated);

        return new LiveParticipantResource($liveParticipant);
    }

    public function show(
        Request $request,
        LiveParticipant $liveParticipant
    ): LiveParticipantResource {
        $this->authorize('view', $liveParticipant);

        return new LiveParticipantResource($liveParticipant);
    }

    public function update(
        LiveParticipantUpdateRequest $request,
        LiveParticipant $liveParticipant
    ): LiveParticipantResource {
        $this->authorize('update', $liveParticipant);

        $validated = $request->validated();

        $liveParticipant->update($validated);

        return new LiveParticipantResource($liveParticipant);
    }

    public function destroy(
        Request $request,
        LiveParticipant $liveParticipant
    ): Response {
        $this->authorize('delete', $liveParticipant);

        $liveParticipant->delete();

        return response()->noContent();
    }
}
