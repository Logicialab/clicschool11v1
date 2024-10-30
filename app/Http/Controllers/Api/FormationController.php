<?php

namespace App\Http\Controllers\Api;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\FormationResource;
use App\Http\Resources\FormationCollection;
use App\Http\Requests\Backend\FormationStoreRequest;
use App\Http\Requests\Backend\FormationUpdateRequest;

class FormationController extends Controller
{
    public function index(Request $request): FormationCollection
    {
        $this->authorize('view-any', Formation::class);

        $search = $request->get('search', '');

        $formations = Formation::search($search)
            ->latest()
            ->paginate();

        return new FormationCollection($formations);
    }

    public function store(FormationStoreRequest $request): FormationResource
    {
        $this->authorize('create', Formation::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $formation = Formation::create($validated);

        return new FormationResource($formation);
    }

    public function show(
        Request $request,
        Formation $formation
    ): FormationResource {
        $this->authorize('view', $formation);

        return new FormationResource($formation);
    }

    public function update(
        FormationUpdateRequest $request,
        Formation $formation
    ): FormationResource {
        $this->authorize('update', $formation);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($formation->image) {
                Storage::delete($formation->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $formation->update($validated);

        return new FormationResource($formation);
    }

    public function destroy(Request $request, Formation $formation): Response
    {
        $this->authorize('delete', $formation);

        if ($formation->image) {
            Storage::delete($formation->image);
        }

        $formation->delete();

        return response()->noContent();
    }
}
