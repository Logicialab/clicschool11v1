<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\FormationType;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormationResource;
use App\Http\Resources\FormationCollection;

class FormationTypeFormationsController extends Controller
{
    public function index(
        Request $request,
        FormationType $formationType
    ): FormationCollection {
        $this->authorize('view', $formationType);

        $search = $request->get('search', '');

        $formations = $formationType
            ->formations()
            ->search($search)
            ->latest()
            ->paginate();

        return new FormationCollection($formations);
    }

    public function store(
        Request $request,
        FormationType $formationType
    ): FormationResource {
        $this->authorize('create', Formation::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'status' => ['nullable', 'max:255', 'string'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'active' => ['required', 'boolean'],
            'slug' => [
                'nullable',
                'unique:formations,slug',
                'max:255',
                'string',
            ],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $formation = $formationType->formations()->create($validated);

        return new FormationResource($formation);
    }
}
