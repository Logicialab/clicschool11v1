<?php

namespace App\Http\Controllers\Api;

use App\Models\QuestionQuiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentAnswerQuizResource;
use App\Http\Resources\StudentAnswerQuizCollection;

class QuestionQuizStudentAnswerQuizsController extends Controller
{
    public function index(
        Request $request,
        QuestionQuiz $questionQuiz
    ): StudentAnswerQuizCollection {
        $this->authorize('view', $questionQuiz);

        $search = $request->get('search', '');

        $studentAnswerQuizs = $questionQuiz
            ->studentAnswerQuizs()
            ->search($search)
            ->latest()
            ->paginate();

        return new StudentAnswerQuizCollection($studentAnswerQuizs);
    }

    public function store(
        Request $request,
        QuestionQuiz $questionQuiz
    ): StudentAnswerQuizResource {
        $this->authorize('create', StudentAnswerQuiz::class);

        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'text' => ['required', 'max:255', 'string'],
            'is_correct' => ['nullable', 'boolean'],
        ]);

        $studentAnswerQuiz = $questionQuiz
            ->studentAnswerQuizs()
            ->create($validated);

        return new StudentAnswerQuizResource($studentAnswerQuiz);
    }
}
