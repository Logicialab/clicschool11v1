<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CompetitionQuestion;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionQuestionResource;
use App\Http\Resources\CompetitionQuestionCollection;
use App\Http\Requests\Backend\CompetitionQuestionStoreRequest;
use App\Http\Requests\Backend\CompetitionQuestionUpdateRequest;

class CompetitionQuestionController extends Controller
{
    public function index(Request $request): CompetitionQuestionCollection
    {
        $this->authorize('view-any', CompetitionQuestion::class);

        $search = $request->get('search', '');

        $competitionQuestions = CompetitionQuestion::search($search)
            ->latest()
            ->paginate();

        return new CompetitionQuestionCollection($competitionQuestions);
    }

    public function store(
        CompetitionQuestionStoreRequest $request
    ): CompetitionQuestionResource {
        $this->authorize('create', CompetitionQuestion::class);

        $validated = $request->validated();

        $competitionQuestion = CompetitionQuestion::create($validated);

        return new CompetitionQuestionResource($competitionQuestion);
    }

    public function show(
        Request $request,
        CompetitionQuestion $competitionQuestion
    ): CompetitionQuestionResource {
        $this->authorize('view', $competitionQuestion);

        return new CompetitionQuestionResource($competitionQuestion);
    }

    public function update(
        CompetitionQuestionUpdateRequest $request,
        CompetitionQuestion $competitionQuestion
    ): CompetitionQuestionResource {
        $this->authorize('update', $competitionQuestion);

        $validated = $request->validated();

        $competitionQuestion->update($validated);

        return new CompetitionQuestionResource($competitionQuestion);
    }

    public function destroy(
        Request $request,
        CompetitionQuestion $competitionQuestion
    ): Response {
        $this->authorize('delete', $competitionQuestion);

        $competitionQuestion->delete();

        return response()->noContent();
    }
}
