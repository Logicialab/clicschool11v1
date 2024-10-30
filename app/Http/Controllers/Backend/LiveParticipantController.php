<?php

namespace App\Http\Controllers\Backend;

use App\Models\Live;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\LiveParticipant;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\LiveParticipantStoreRequest;
use App\Http\Requests\Backend\LiveParticipantUpdateRequest;

class LiveParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', LiveParticipant::class);

        $search = $request->get('search', '');

        $liveParticipants = LiveParticipant::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.live_participants.index',
            compact('liveParticipants', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', LiveParticipant::class);

        $lives = Live::pluck('url', 'id');
        $students = Student::pluck('first_name', 'id');

        return view(
            'backend.live_participants.create',
            compact('lives', 'students')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        LiveParticipantStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', LiveParticipant::class);

        $validated = $request->validated();

        $liveParticipant = LiveParticipant::create($validated);

        return redirect()
            ->route('live-participants.edit', $liveParticipant)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        LiveParticipant $liveParticipant
    ): View {
        $this->authorize('view', $liveParticipant);

        return view(
            'backend.live_participants.show',
            compact('liveParticipant')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        LiveParticipant $liveParticipant
    ): View {
        $this->authorize('update', $liveParticipant);

        $lives = Live::pluck('url', 'id');
        $students = Student::pluck('first_name', 'id');

        return view(
            'backend.live_participants.edit',
            compact('liveParticipant', 'lives', 'students')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        LiveParticipantUpdateRequest $request,
        LiveParticipant $liveParticipant
    ): RedirectResponse {
        $this->authorize('update', $liveParticipant);

        $validated = $request->validated();

        $liveParticipant->update($validated);

        return redirect()
            ->route('live-participants.edit', $liveParticipant)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        LiveParticipant $liveParticipant
    ): RedirectResponse {
        $this->authorize('delete', $liveParticipant);

        $liveParticipant->delete();

        return redirect()
            ->route('live-participants.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
