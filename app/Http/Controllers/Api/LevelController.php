<?php

namespace App\Http\Controllers\Api;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\LevelResource;
use App\Http\Resources\LevelCollection;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\LevelStoreRequest;
use App\Http\Requests\Backend\LevelUpdateRequest;

class LevelController extends Controller
{
    public function index(Request $request): LevelCollection
    {
        $this->authorize('view-any', Level::class);

        $search = $request->get('search', '');

        $levels = Level::search($search)
            ->latest()
            ->paginate();

        return new LevelCollection($levels);
    }

    public function store(LevelStoreRequest $request): LevelResource
    {
        $this->authorize('create', Level::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $level = Level::create($validated);

        return new LevelResource($level);
    }

    public function show(Request $request, Level $level): LevelResource
    {
        $this->authorize('view', $level);

        return new LevelResource($level);
    }

    public function update(
        LevelUpdateRequest $request,
        Level $level
    ): LevelResource {
        $this->authorize('update', $level);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($level->image) {
                Storage::delete($level->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $level->update($validated);

        return new LevelResource($level);
    }

    public function destroy(Request $request, Level $level): Response
    {
        $this->authorize('delete', $level);

        if ($level->image) {
            Storage::delete($level->image);
        }

        $level->delete();

        return response()->noContent();
    }
}
