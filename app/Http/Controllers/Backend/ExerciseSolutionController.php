<?php

namespace App\Http\Controllers\Backend;

use App\Models\Exercice;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ExerciseSolution;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\ExerciseSolutionStoreRequest;
use App\Http\Requests\Backend\ExerciseSolutionUpdateRequest;

class ExerciseSolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ExerciseSolution::class);

        $search = $request->get('search', '');

        $exerciseSolutions = ExerciseSolution::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.exercise_solutions.index',
            compact('exerciseSolutions', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ExerciseSolution::class);

        $exercices = Exercice::pluck('name', 'id');

        return view('backend.exercise_solutions.create', compact('exercices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        ExerciseSolutionStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', ExerciseSolution::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $exerciseSolution = ExerciseSolution::create($validated);

        return redirect()
            ->route('exercise-solutions.edit', $exerciseSolution)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        ExerciseSolution $exerciseSolution
    ): View {
        $this->authorize('view', $exerciseSolution);

        return view(
            'backend.exercise_solutions.show',
            compact('exerciseSolution')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        ExerciseSolution $exerciseSolution
    ): View {
        $this->authorize('update', $exerciseSolution);

        $exercices = Exercice::pluck('name', 'id');

        return view(
            'backend.exercise_solutions.edit',
            compact('exerciseSolution', 'exercices')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ExerciseSolutionUpdateRequest $request,
        ExerciseSolution $exerciseSolution
    ): RedirectResponse {
        $this->authorize('update', $exerciseSolution);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            if ($exerciseSolution->file) {
                Storage::delete($exerciseSolution->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $exerciseSolution->update($validated);

        return redirect()
            ->route('exercise-solutions.edit', $exerciseSolution)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ExerciseSolution $exerciseSolution
    ): RedirectResponse {
        $this->authorize('delete', $exerciseSolution);

        if ($exerciseSolution->file) {
            Storage::delete($exerciseSolution->file);
        }

        $exerciseSolution->delete();

        return redirect()
            ->route('exercise-solutions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
