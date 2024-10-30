<?php

namespace App\Http\Controllers\Api;

use App\Models\Live;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\LiveResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\LiveCollection;
use App\Http\Requests\Backend\LiveStoreRequest;
use App\Http\Requests\Backend\LiveUpdateRequest;

class LiveController extends Controller
{
    public function index(Request $request): LiveCollection
    {
        $this->authorize('view-any', Live::class);

        $search = $request->get('search', '');

        $lives = Live::search($search)
            ->latest()
            ->paginate();

        return new LiveCollection($lives);
    }

    public function store(LiveStoreRequest $request): LiveResource
    {
        $this->authorize('create', Live::class);

        $validated = $request->validated();

        $live = Live::create($validated);

        return new LiveResource($live);
    }

    public function show(Request $request, Live $live): LiveResource
    {
        $this->authorize('view', $live);

        return new LiveResource($live);
    }

    public function update(LiveUpdateRequest $request, Live $live): LiveResource
    {
        $this->authorize('update', $live);

        $validated = $request->validated();

        $live->update($validated);

        return new LiveResource($live);
    }

    public function destroy(Request $request, Live $live): Response
    {
        $this->authorize('delete', $live);

        $live->delete();

        return response()->noContent();
    }
}
