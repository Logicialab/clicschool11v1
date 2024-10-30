<?php

namespace App\Http\Controllers\Api;

use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClasseResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ClasseCollection;
use App\Http\Requests\Backend\ClasseStoreRequest;
use App\Http\Requests\Backend\ClasseUpdateRequest;

class ClasseController extends Controller
{
    public function index(Request $request): ClasseCollection
    {
        $this->authorize('view-any', Classe::class);

        $search = $request->get('search', '');

        $classes = Classe::search($search)
            ->latest()
            ->paginate();

        return new ClasseCollection($classes);
    }

    public function store(ClasseStoreRequest $request): ClasseResource
    {
        $this->authorize('create', Classe::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $classe = Classe::create($validated);

        return new ClasseResource($classe);
    }

    public function show(Request $request, Classe $classe): ClasseResource
    {
        $this->authorize('view', $classe);

        return new ClasseResource($classe);
    }

    public function update(
        ClasseUpdateRequest $request,
        Classe $classe
    ): ClasseResource {
        $this->authorize('update', $classe);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($classe->image) {
                Storage::delete($classe->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $classe->update($validated);

        return new ClasseResource($classe);
    }

    public function destroy(Request $request, Classe $classe): Response
    {
        $this->authorize('delete', $classe);

        if ($classe->image) {
            Storage::delete($classe->image);
        }

        $classe->delete();

        return response()->noContent();
    }
}
