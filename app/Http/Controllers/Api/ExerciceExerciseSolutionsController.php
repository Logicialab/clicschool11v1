<?php

namespace App\Http\Controllers\Api;

use App\Models\Exercice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseSolutionResource;
use App\Http\Resources\ExerciseSolutionCollection;

class ExerciceExerciseSolutionsController extends Controller
{
    public function index(
        Request $request,
        Exercice $exercice
    ): ExerciseSolutionCollection {
        $this->authorize('view', $exercice);

        $search = $request->get('search', '');

        $exerciseSolutions = $exercice
            ->exerciseSolutions()
            ->search($search)
            ->latest()
            ->paginate();

        return new ExerciseSolutionCollection($exerciseSolutions);
    }

    public function store(
        Request $request,
        Exercice $exercice
    ): ExerciseSolutionResource {
        $this->authorize('create', ExerciseSolution::class);

        $validated = $request->validate([
            'solution' => ['required', 'max:255', 'string'],
            'file' => ['file', 'max:1024', 'nullable'],
            'active' => ['required', 'boolean'],
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $exerciseSolution = $exercice->exerciseSolutions()->create($validated);

        return new ExerciseSolutionResource($exerciseSolution);
    }
}
