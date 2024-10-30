<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\FormationType;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormationTypeResource;
use App\Http\Resources\FormationTypeCollection;
use App\Http\Requests\Backend\FormationTypeStoreRequest;
use App\Http\Requests\Backend\FormationTypeUpdateRequest;

class FormationTypeController extends Controller
{
    public function index(Request $request): FormationTypeCollection
    {
        $this->authorize('view-any', FormationType::class);

        $search = $request->get('search', '');

        $formationTypes = FormationType::search($search)
            ->latest()
            ->paginate();

        return new FormationTypeCollection($formationTypes);
    }

    public function store(
        FormationTypeStoreRequest $request
    ): FormationTypeResource {
        $this->authorize('create', FormationType::class);

        $validated = $request->validated();

        $formationType = FormationType::create($validated);

        return new FormationTypeResource($formationType);
    }

    public function show(
        Request $request,
        FormationType $formationType
    ): FormationTypeResource {
        $this->authorize('view', $formationType);

        return new FormationTypeResource($formationType);
    }

    public function update(
        FormationTypeUpdateRequest $request,
        FormationType $formationType
    ): FormationTypeResource {
        $this->authorize('update', $formationType);

        $validated = $request->validated();

        $formationType->update($validated);

        return new FormationTypeResource($formationType);
    }

    public function destroy(
        Request $request,
        FormationType $formationType
    ): Response {
        $this->authorize('delete', $formationType);

        $formationType->delete();

        return response()->noContent();
    }
}
