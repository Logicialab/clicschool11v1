<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use App\Models\Exercice;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\ExerciceStoreRequest;
use App\Http\Requests\Backend\ExerciceUpdateRequest;

class ExerciceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Exercice::class);

        $search = $request->get('search', '');

        $exercices = Exercice::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.exercices.index', compact('exercices', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Exercice::class);

        $courses = Course::pluck('title', 'id');

        return view('backend.exercices.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExerciceStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Exercice::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $exercice = Exercice::create($validated);

        return redirect()
            ->route('exercices.edit', $exercice)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Exercice $exercice): View
    {
        $this->authorize('view', $exercice);

        return view('backend.exercices.show', compact('exercice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Exercice $exercice): View
    {
        $this->authorize('update', $exercice);

        $courses = Course::pluck('title', 'id');

        return view('backend.exercices.edit', compact('exercice', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ExerciceUpdateRequest $request,
        Exercice $exercice
    ): RedirectResponse {
        $this->authorize('update', $exercice);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            if ($exercice->file) {
                Storage::delete($exercice->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $exercice->update($validated);

        return redirect()
            ->route('exercices.edit', $exercice)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Exercice $exercice
    ): RedirectResponse {
        $this->authorize('delete', $exercice);

        if ($exercice->file) {
            Storage::delete($exercice->file);
        }

        $exercice->delete();

        return redirect()
            ->route('exercices.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
