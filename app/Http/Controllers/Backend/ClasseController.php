<?php

namespace App\Http\Controllers\Backend;

use App\Models\Level;
use App\Models\Classe;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\ClasseStoreRequest;
use App\Http\Requests\Backend\ClasseUpdateRequest;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Classe::class);

        $search = $request->get('search', '');

        $classes = Classe::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.classes.index', compact('classes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Classe::class);

        $levels = Level::pluck('name', 'id');

        return view('backend.classes.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClasseStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Classe::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $classe = Classe::create($validated);

        return redirect()
            ->route('classes.edit', $classe)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Classe $classe): View
    {
        $this->authorize('view', $classe);

        return view('backend.classes.show', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Classe $classe): View
    {
        $this->authorize('update', $classe);

        $levels = Level::pluck('name', 'id');

        return view('backend.classes.edit', compact('classe', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ClasseUpdateRequest $request,
        Classe $classe
    ): RedirectResponse {
        $this->authorize('update', $classe);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($classe->image) {
                Storage::delete($classe->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $classe->update($validated);

        return redirect()
            ->route('classes.edit', $classe)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Classe $classe): RedirectResponse
    {
        $this->authorize('delete', $classe);

        if ($classe->image) {
            Storage::delete($classe->image);
        }

        $classe->delete();

        return redirect()
            ->route('classes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
