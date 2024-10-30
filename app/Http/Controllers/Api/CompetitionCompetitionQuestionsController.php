<?php

namespace App\Http\Controllers\Api;

use App\Models\Competition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionQuestionResource;
use App\Http\Resources\CompetitionQuestionCollection;

class CompetitionCompetitionQuestionsController extends Controller
{
    public function index(
        Request $request,
        Competition $competition
    ): CompetitionQuestionCollection {
        $this->authorize('view', $competition);

        $search = $request->get('search', '');

        $competitionQuestions = $competition
            ->competitionQuestions()
            ->search($search)
            ->latest()
            ->paginate();

        return new CompetitionQuestionCollection($competitionQuestions);
    }

    public function store(
        Request $request,
        Competition $competition
    ): CompetitionQuestionResource {
        $this->authorize('create', CompetitionQuestion::class);

        $validated = $request->validate([
            'question' => ['required', 'max:255', 'string'],
            'question_type' => ['required', 'max:255', 'string'],
        ]);

        $competitionQuestion = $competition
            ->competitionQuestions()
            ->create($validated);

        return new CompetitionQuestionResource($competitionQuestion);
    }
}
