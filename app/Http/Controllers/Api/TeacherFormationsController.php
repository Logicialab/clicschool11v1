<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormationResource;
use App\Http\Resources\FormationCollection;

class TeacherFormationsController extends Controller
{
    public function index(
        Request $request,
        Teacher $teacher
    ): FormationCollection {
        $this->authorize('view', $teacher);

        $search = $request->get('search', '');

        $formations = $teacher
            ->formations()
            ->search($search)
            ->latest()
            ->paginate();

        return new FormationCollection($formations);
    }

    public function store(Request $request, Teacher $teacher): FormationResource
    {
        $this->authorize('create', Formation::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'formation_type_id' => ['required', 'exists:formation_types,id'],
            'description' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'status' => ['nullable', 'max:255', 'string'],
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

        $formation = $teacher->formations()->create($validated);

        return new FormationResource($formation);
    }
}
