<?php

namespace App\Http\Controllers\Api;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\SubjectCollection;

class ClasseSubjectsController extends Controller
{
    public function index(Request $request, Classe $classe): SubjectCollection
    {
        $this->authorize('view', $classe);

        $search = $request->get('search', '');

        $subjects = $classe
            ->subjects()
            ->search($search)
            ->latest()
            ->paginate();

        return new SubjectCollection($subjects);
    }

    public function store(Request $request, Classe $classe): SubjectResource
    {
        $this->authorize('create', Subject::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'slug' => ['nullable', 'unique:subjects,slug', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $subject = $classe->subjects()->create($validated);

        return new SubjectResource($subject);
    }
}
