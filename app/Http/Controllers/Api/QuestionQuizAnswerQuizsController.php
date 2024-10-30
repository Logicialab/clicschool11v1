<?php

namespace App\Http\Controllers\Api;

use App\Models\QuestionQuiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnswerQuizResource;
use App\Http\Resources\AnswerQuizCollection;

class QuestionQuizAnswerQuizsController extends Controller
{
    public function index(
        Request $request,
        QuestionQuiz $questionQuiz
    ): AnswerQuizCollection {
        $this->authorize('view', $questionQuiz);

        $search = $request->get('search', '');

        $answerQuizs = $questionQuiz
            ->answerQuizs()
            ->search($search)
            ->latest()
            ->paginate();

        return new AnswerQuizCollection($answerQuizs);
    }

    public function store(
        Request $request,
        QuestionQuiz $questionQuiz
    ): AnswerQuizResource {
        $this->authorize('create', AnswerQuiz::class);

        $validated = $request->validate([
            'text' => ['required', 'max:255', 'string'],
        ]);

        $answerQuiz = $questionQuiz->answerQuizs()->create($validated);

        return new AnswerQuizResource($answerQuiz);
    }
}
