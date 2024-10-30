<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LiveParticipantResource;
use App\Http\Resources\LiveParticipantCollection;

class StudentLiveParticipantsController extends Controller
{
    public function index(
        Request $request,
        Student $student
    ): LiveParticipantCollection {
        $this->authorize('view', $student);

        $search = $request->get('search', '');

        $liveParticipants = $student
            ->liveParticipants()
            ->search($search)
            ->latest()
            ->paginate();

        return new LiveParticipantCollection($liveParticipants);
    }

    public function store(
        Request $request,
        Student $student
    ): LiveParticipantResource {
        $this->authorize('create', LiveParticipant::class);

        $validated = $request->validate([
            'live_id' => ['required', 'exists:lives,id'],
        ]);

        $liveParticipant = $student->liveParticipants()->create($validated);

        return new LiveParticipantResource($liveParticipant);
    }
}
