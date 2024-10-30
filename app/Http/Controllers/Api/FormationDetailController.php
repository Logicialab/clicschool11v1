<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\FormationDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\FormationDetailResource;
use App\Http\Resources\FormationDetailCollection;
use App\Http\Requests\Backend\FormationDetailStoreRequest;
use App\Http\Requests\Backend\FormationDetailUpdateRequest;

class FormationDetailController extends Controller
{
    public function index(Request $request): FormationDetailCollection
    {
        $this->authorize('view-any', FormationDetail::class);

        $search = $request->get('search', '');

        $formationDetails = FormationDetail::search($search)
            ->latest()
            ->paginate();

        return new FormationDetailCollection($formationDetails);
    }

    public function store(
        FormationDetailStoreRequest $request
    ): FormationDetailResource {
        $this->authorize('create', FormationDetail::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $formationDetail = FormationDetail::create($validated);

        return new FormationDetailResource($formationDetail);
    }

    public function show(
        Request $request,
        FormationDetail $formationDetail
    ): FormationDetailResource {
        $this->authorize('view', $formationDetail);

        return new FormationDetailResource($formationDetail);
    }

    public function update(
        FormationDetailUpdateRequest $request,
        FormationDetail $formationDetail
    ): FormationDetailResource {
        $this->authorize('update', $formationDetail);

        $validated = $request->validated();

        if ($request->hasFile('file')) {
            if ($formationDetail->file) {
                Storage::delete($formationDetail->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $formationDetail->update($validated);

        return new FormationDetailResource($formationDetail);
    }

    public function destroy(
        Request $request,
        FormationDetail $formationDetail
    ): Response {
        $this->authorize('delete', $formationDetail);

        if ($formationDetail->file) {
            Storage::delete($formationDetail->file);
        }

        $formationDetail->delete();

        return response()->noContent();
    }
}
