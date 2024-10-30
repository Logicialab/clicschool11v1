<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionQuizResource;
use App\Http\Resources\QuestionQuizCollection;

class QuizQuestionQuizsController extends Controller
{
    public function index(Request $request, Quiz $quiz): QuestionQuizCollection
    {
        $this->authorize('view', $quiz);

        $search = $request->get('search', '');

        $questionQuizs = $quiz
            ->questionQuizs()
            ->search($search)
            ->latest()
            ->paginate();

        return new QuestionQuizCollection($questionQuizs);
    }

    public function store(Request $request, Quiz $quiz): QuestionQuizResource
    {
        $this->authorize('create', QuestionQuiz::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'type' => ['required', 'max:255', 'string'],
        ]);

        $questionQuiz = $quiz->questionQuizs()->create($validated);

        return new QuestionQuizResource($questionQuiz);
    }
}
