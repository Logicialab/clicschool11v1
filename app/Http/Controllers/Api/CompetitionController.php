<?php

namespace App\Http\Controllers\Api;

use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CompetitionResource;
use App\Http\Resources\CompetitionCollection;
use App\Http\Requests\Backend\CompetitionStoreRequest;
use App\Http\Requests\Backend\CompetitionUpdateRequest;

class CompetitionController extends Controller
{
    public function index(Request $request): CompetitionCollection
    {
        $this->authorize('view-any', Competition::class);

        $search = $request->get('search', '');

        $competitions = Competition::search($search)
            ->latest()
            ->paginate();

        return new CompetitionCollection($competitions);
    }

    public function store(CompetitionStoreRequest $request): CompetitionResource
    {
        $this->authorize('create', Competition::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $competition = Competition::create($validated);

        return new CompetitionResource($competition);
    }

    public function show(
        Request $request,
        Competition $competition
    ): CompetitionResource {
        $this->authorize('view', $competition);

        return new CompetitionResource($competition);
    }

    public function update(
        CompetitionUpdateRequest $request,
        Competition $competition
    ): CompetitionResource {
        $this->authorize('update', $competition);

        $validated = $request->validated();

        if ($request->hasFile('file')) {
            if ($competition->file) {
                Storage::delete($competition->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $competition->update($validated);

        return new CompetitionResource($competition);
    }

    public function destroy(
        Request $request,
        Competition $competition
    ): Response {
        $this->authorize('delete', $competition);

        if ($competition->file) {
            Storage::delete($competition->file);
        }

        $competition->delete();

        return response()->noContent();
    }
}
