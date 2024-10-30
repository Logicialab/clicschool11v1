<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ExerciseSolution;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ExerciseSolutionResource;
use App\Http\Resources\ExerciseSolutionCollection;
use App\Http\Requests\Backend\ExerciseSolutionStoreRequest;
use App\Http\Requests\Backend\ExerciseSolutionUpdateRequest;

class ExerciseSolutionController extends Controller
{
    public function index(Request $request): ExerciseSolutionCollection
    {
        $this->authorize('view-any', ExerciseSolution::class);

        $search = $request->get('search', '');

        $exerciseSolutions = ExerciseSolution::search($search)
            ->latest()
            ->paginate();

        return new ExerciseSolutionCollection($exerciseSolutions);
    }

    public function store(
        ExerciseSolutionStoreRequest $request
    ): ExerciseSolutionResource {
        $this->authorize('create', ExerciseSolution::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $exerciseSolution = ExerciseSolution::create($validated);

        return new ExerciseSolutionResource($exerciseSolution);
    }

    public function show(
        Request $request,
        ExerciseSolution $exerciseSolution
    ): ExerciseSolutionResource {
        $this->authorize('view', $exerciseSolution);

        return new ExerciseSolutionResource($exerciseSolution);
    }

    public function update(
        ExerciseSolutionUpdateRequest $request,
        ExerciseSolution $exerciseSolution
    ): ExerciseSolutionResource {
        $this->authorize('update', $exerciseSolution);

        $validated = $request->validated();

        if ($request->hasFile('file')) {
            if ($exerciseSolution->file) {
                Storage::delete($exerciseSolution->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $exerciseSolution->update($validated);

        return new ExerciseSolutionResource($exerciseSolution);
    }

    public function destroy(
        Request $request,
        ExerciseSolution $exerciseSolution
    ): Response {
        $this->authorize('delete', $exerciseSolution);

        if ($exerciseSolution->file) {
            Storage::delete($exerciseSolution->file);
        }

        $exerciseSolution->delete();

        return response()->noContent();
    }
}
