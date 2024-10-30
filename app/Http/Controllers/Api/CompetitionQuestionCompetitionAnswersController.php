<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CompetitionQuestion;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionAnswerResource;
use App\Http\Resources\CompetitionAnswerCollection;

class CompetitionQuestionCompetitionAnswersController extends Controller
{
    public function index(
        Request $request,
        CompetitionQuestion $competitionQuestion
    ): CompetitionAnswerCollection {
        $this->authorize('view', $competitionQuestion);

        $search = $request->get('search', '');

        $competitionAnswers = $competitionQuestion
            ->competitionAnswers()
            ->search($search)
            ->latest()
            ->paginate();

        return new CompetitionAnswerCollection($competitionAnswers);
    }

    public function store(
        Request $request,
        CompetitionQuestion $competitionQuestion
    ): CompetitionAnswerResource {
        $this->authorize('create', CompetitionAnswer::class);

        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'text' => ['required', 'max:255', 'string'],
            'is_correct' => ['nullable', 'boolean'],
        ]);

        $competitionAnswer = $competitionQuestion
            ->competitionAnswers()
            ->create($validated);

        return new CompetitionAnswerResource($competitionAnswer);
    }
}
