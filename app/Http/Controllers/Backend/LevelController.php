<?php

namespace App\Http\Controllers\Backend;

use App\Models\Level;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\LevelStoreRequest;
use App\Http\Requests\Backend\LevelUpdateRequest;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Level::class);

        $search = $request->get('search', '');

        $levels = Level::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.levels.index', compact('levels', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Level::class);

        return view('backend.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Level::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $level = Level::create($validated);

        return redirect()
            ->route('levels.edit', $level)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Level $level): View
    {
        $this->authorize('view', $level);

        return view('backend.levels.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Level $level): View
    {
        $this->authorize('update', $level);

        return view('backend.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        LevelUpdateRequest $request,
        Level $level
    ): RedirectResponse {
        $this->authorize('update', $level);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($level->image) {
                Storage::delete($level->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $level->update($validated);

        return redirect()
            ->route('levels.edit', $level)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Level $level): RedirectResponse
    {
        $this->authorize('delete', $level);

        if ($level->image) {
            Storage::delete($level->image);
        }

        $level->delete();

        return redirect()
            ->route('levels.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
