<?php

namespace App\Http\Controllers\Api;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClasseResource;
use App\Http\Resources\ClasseCollection;

class LevelClassesController extends Controller
{
    public function index(Request $request, Level $level): ClasseCollection
    {
        $this->authorize('view', $level);

        $search = $request->get('search', '');

        $classes = $level
            ->classes()
            ->search($search)
            ->latest()
            ->paginate();

        return new ClasseCollection($classes);
    }

    public function store(Request $request, Level $level): ClasseResource
    {
        $this->authorize('create', Classe::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'slug' => ['nullable', 'unique:classes,slug', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'annee_scolaire' => ['nullable', 'max:255', 'string'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $classe = $level->classes()->create($validated);

        return new ClasseResource($classe);
    }
}
