<?php

namespace App\Http\Controllers\Api;

use App\Models\Exercice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ExerciceResource;
use App\Http\Resources\ExerciceCollection;
use App\Http\Requests\Backend\ExerciceStoreRequest;
use App\Http\Requests\Backend\ExerciceUpdateRequest;

class ExerciceController extends Controller
{
    public function index(Request $request): ExerciceCollection
    {
        $this->authorize('view-any', Exercice::class);

        $search = $request->get('search', '');

        $exercices = Exercice::search($search)
            ->latest()
            ->paginate();

        return new ExerciceCollection($exercices);
    }

    public function store(ExerciceStoreRequest $request): ExerciceResource
    {
        $this->authorize('create', Exercice::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $exercice = Exercice::create($validated);

        return new ExerciceResource($exercice);
    }

    public function show(Request $request, Exercice $exercice): ExerciceResource
    {
        $this->authorize('view', $exercice);

        return new ExerciceResource($exercice);
    }

    public function update(
        ExerciceUpdateRequest $request,
        Exercice $exercice
    ): ExerciceResource {
        $this->authorize('update', $exercice);

        $validated = $request->validated();

        if ($request->hasFile('file')) {
            if ($exercice->file) {
                Storage::delete($exercice->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $exercice->update($validated);

        return new ExerciceResource($exercice);
    }

    public function destroy(Request $request, Exercice $exercice): Response
    {
        $this->authorize('delete', $exercice);

        if ($exercice->file) {
            Storage::delete($exercice->file);
        }

        $exercice->delete();

        return response()->noContent();
    }
}
