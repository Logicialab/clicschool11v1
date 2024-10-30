<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentAnswerQuizResource;
use App\Http\Resources\StudentAnswerQuizCollection;

class StudentStudentAnswerQuizsController extends Controller
{
    public function index(
        Request $request,
        Student $student
    ): StudentAnswerQuizCollection {
        $this->authorize('view', $student);

        $search = $request->get('search', '');

        $studentAnswerQuizs = $student
            ->studentAnswerQuizs()
            ->search($search)
            ->latest()
            ->paginate();

        return new StudentAnswerQuizCollection($studentAnswerQuizs);
    }

    public function store(
        Request $request,
        Student $student
    ): StudentAnswerQuizResource {
        $this->authorize('create', StudentAnswerQuiz::class);

        $validated = $request->validate([
            'questionQuiz_id' => ['required', 'exists:question_quizs,id'],
            'text' => ['required', 'max:255', 'string'],
            'is_correct' => ['nullable', 'boolean'],
        ]);

        $studentAnswerQuiz = $student->studentAnswerQuizs()->create($validated);

        return new StudentAnswerQuizResource($studentAnswerQuiz);
    }
}
