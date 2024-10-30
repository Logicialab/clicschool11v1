<?php

namespace App\Http\Controllers\Api;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormationDetailResource;
use App\Http\Resources\FormationDetailCollection;

class FormationFormationDetailsController extends Controller
{
    public function index(
        Request $request,
        Formation $formation
    ): FormationDetailCollection {
        $this->authorize('view', $formation);

        $search = $request->get('search', '');

        $formationDetails = $formation
            ->formationDetails()
            ->search($search)
            ->latest()
            ->paginate();

        return new FormationDetailCollection($formationDetails);
    }

    public function store(
        Request $request,
        Formation $formation
    ): FormationDetailResource {
        $this->authorize('create', FormationDetail::class);

        $validated = $request->validate([
            'title' => ['nullable', 'max:255', 'string'],
            'url' => ['nullable', 'url'],
            'description' => ['nullable', 'max:255', 'string'],
            'file' => ['nullable', 'file'],
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $formationDetail = $formation->formationDetails()->create($validated);

        return new FormationDetailResource($formationDetail);
    }
}
