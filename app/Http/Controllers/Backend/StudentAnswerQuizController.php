<?php

namespace App\Http\Controllers\Backend;

use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\QuestionQuiz;
use App\Models\StudentAnswerQuiz;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\StudentAnswerQuizStoreRequest;
use App\Http\Requests\Backend\StudentAnswerQuizUpdateRequest;

class StudentAnswerQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', StudentAnswerQuiz::class);

        $search = $request->get('search', '');

        $studentAnswerQuizs = StudentAnswerQuiz::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.student_answer_quizs.index',
            compact('studentAnswerQuizs', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', StudentAnswerQuiz::class);

        $questionQuizs = QuestionQuiz::pluck('title', 'id');
        $students = Student::pluck('first_name', 'id');

        return view(
            'backend.student_answer_quizs.create',
            compact('questionQuizs', 'students')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StudentAnswerQuizStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', StudentAnswerQuiz::class);

        $validated = $request->validated();

        $studentAnswerQuiz = StudentAnswerQuiz::create($validated);

        return redirect()
            ->route('student-answer-quizs.edit', $studentAnswerQuiz)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        StudentAnswerQuiz $studentAnswerQuiz
    ): View {
        $this->authorize('view', $studentAnswerQuiz);

        return view(
            'backend.student_answer_quizs.show',
            compact('studentAnswerQuiz')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        StudentAnswerQuiz $studentAnswerQuiz
    ): View {
        $this->authorize('update', $studentAnswerQuiz);

        $questionQuizs = QuestionQuiz::pluck('title', 'id');
        $students = Student::pluck('first_name', 'id');

        return view(
            'backend.student_answer_quizs.edit',
            compact('studentAnswerQuiz', 'questionQuizs', 'students')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        StudentAnswerQuizUpdateRequest $request,
        StudentAnswerQuiz $studentAnswerQuiz
    ): RedirectResponse {
        $this->authorize('update', $studentAnswerQuiz);

        $validated = $request->validated();

        $studentAnswerQuiz->update($validated);

        return redirect()
            ->route('student-answer-quizs.edit', $studentAnswerQuiz)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        StudentAnswerQuiz $studentAnswerQuiz
    ): RedirectResponse {
        $this->authorize('delete', $studentAnswerQuiz);

        $studentAnswerQuiz->delete();

        return redirect()
            ->route('student-answer-quizs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
