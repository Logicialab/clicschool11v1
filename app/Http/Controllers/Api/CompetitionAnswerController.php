<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CompetitionAnswer;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionAnswerResource;
use App\Http\Resources\CompetitionAnswerCollection;
use App\Http\Requests\Backend\CompetitionAnswerStoreRequest;
use App\Http\Requests\Backend\CompetitionAnswerUpdateRequest;

class CompetitionAnswerController extends Controller
{
    public function index(Request $request): CompetitionAnswerCollection
    {
        $this->authorize('view-any', CompetitionAnswer::class);

        $search = $request->get('search', '');

        $competitionAnswers = CompetitionAnswer::search($search)
            ->latest()
            ->paginate();

        return new CompetitionAnswerCollection($competitionAnswers);
    }

    public function store(
        CompetitionAnswerStoreRequest $request
    ): CompetitionAnswerResource {
        $this->authorize('create', CompetitionAnswer::class);

        $validated = $request->validated();

        $competitionAnswer = CompetitionAnswer::create($validated);

        return new CompetitionAnswerResource($competitionAnswer);
    }

    public function show(
        Request $request,
        CompetitionAnswer $competitionAnswer
    ): CompetitionAnswerResource {
        $this->authorize('view', $competitionAnswer);

        return new CompetitionAnswerResource($competitionAnswer);
    }

    public function update(
        CompetitionAnswerUpdateRequest $request,
        CompetitionAnswer $competitionAnswer
    ): CompetitionAnswerResource {
        $this->authorize('update', $competitionAnswer);

        $validated = $request->validated();

        $competitionAnswer->update($validated);

        return new CompetitionAnswerResource($competitionAnswer);
    }

    public function destroy(
        Request $request,
        CompetitionAnswer $competitionAnswer
    ): Response {
        $this->authorize('delete', $competitionAnswer);

        $competitionAnswer->delete();

        return response()->noContent();
    }
}
