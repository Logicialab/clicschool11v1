<?php

namespace App\Http\Controllers\Api;

use App\Models\Live;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LiveParticipantResource;
use App\Http\Resources\LiveParticipantCollection;

class LiveLiveParticipantsController extends Controller
{
    public function index(
        Request $request,
        Live $live
    ): LiveParticipantCollection {
        $this->authorize('view', $live);

        $search = $request->get('search', '');

        $liveParticipants = $live
            ->liveParticipants()
            ->search($search)
            ->latest()
            ->paginate();

        return new LiveParticipantCollection($liveParticipants);
    }

    public function store(Request $request, Live $live): LiveParticipantResource
    {
        $this->authorize('create', LiveParticipant::class);

        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
        ]);

        $liveParticipant = $live->liveParticipants()->create($validated);

        return new LiveParticipantResource($liveParticipant);
    }
}
