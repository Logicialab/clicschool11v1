<?php

namespace App\Http\Controllers\Backend;

use App\Models\Classe;
use Illuminate\View\View;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\CompetitionStoreRequest;
use App\Http\Requests\Backend\CompetitionUpdateRequest;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Competition::class);

        $search = $request->get('search', '');

        $competitions = Competition::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.competitions.index',
            compact('competitions', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Competition::class);

        $classes = Classe::pluck('name', 'id');

        return view('backend.competitions.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetitionStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Competition::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $competition = Competition::create($validated);

        return redirect()
            ->route('competitions.edit', $competition)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Competition $competition): View
    {
        $this->authorize('view', $competition);

        return view('backend.competitions.show', compact('competition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Competition $competition): View
    {
        $this->authorize('update', $competition);

        $classes = Classe::pluck('name', 'id');

        return view(
            'backend.competitions.edit',
            compact('competition', 'classes')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CompetitionUpdateRequest $request,
        Competition $competition
    ): RedirectResponse {
        $this->authorize('update', $competition);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            if ($competition->file) {
                Storage::delete($competition->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $competition->update($validated);

        return redirect()
            ->route('competitions.edit', $competition)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Competition $competition
    ): RedirectResponse {
        $this->authorize('delete', $competition);

        if ($competition->file) {
            Storage::delete($competition->file);
        }

        $competition->delete();

        return redirect()
            ->route('competitions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
