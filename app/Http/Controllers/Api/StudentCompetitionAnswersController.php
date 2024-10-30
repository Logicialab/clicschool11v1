<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionAnswerResource;
use App\Http\Resources\CompetitionAnswerCollection;

class StudentCompetitionAnswersController extends Controller
{
    public function index(
        Request $request,
        Student $student
    ): CompetitionAnswerCollection {
        $this->authorize('view', $student);

        $search = $request->get('search', '');

        $competitionAnswers = $student
            ->competitionAnswers()
            ->search($search)
            ->latest()
            ->paginate();

        return new CompetitionAnswerCollection($competitionAnswers);
    }

    public function store(
        Request $request,
        Student $student
    ): CompetitionAnswerResource {
        $this->authorize('create', CompetitionAnswer::class);

        $validated = $request->validate([
            'competition_question_id' => [
                'required',
                'exists:competition_questions,id',
            ],
            'text' => ['required', 'max:255', 'string'],
            'is_correct' => ['nullable', 'boolean'],
        ]);

        $competitionAnswer = $student->competitionAnswers()->create($validated);

        return new CompetitionAnswerResource($competitionAnswer);
    }
}
