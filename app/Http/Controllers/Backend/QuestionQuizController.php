<?php

namespace App\Http\Controllers\Backend;

use App\Models\Quiz;
use Illuminate\View\View;
use App\Models\QuestionQuiz;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\QuestionQuizStoreRequest;
use App\Http\Requests\Backend\QuestionQuizUpdateRequest;

class QuestionQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', QuestionQuiz::class);

        $search = $request->get('search', '');

        $questionQuizs = QuestionQuiz::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.question_quizs.index',
            compact('questionQuizs', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', QuestionQuiz::class);

        $quizzes = Quiz::pluck('name', 'id');

        return view('backend.question_quizs.create', compact('quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionQuizStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', QuestionQuiz::class);

        $validated = $request->validated();

        $questionQuiz = QuestionQuiz::create($validated);

        return redirect()
            ->route('question-quizs.edit', $questionQuiz)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, QuestionQuiz $questionQuiz): View
    {
        $this->authorize('view', $questionQuiz);

        return view('backend.question_quizs.show', compact('questionQuiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, QuestionQuiz $questionQuiz): View
    {
        $this->authorize('update', $questionQuiz);

        $quizzes = Quiz::pluck('name', 'id');

        return view(
            'backend.question_quizs.edit',
            compact('questionQuiz', 'quizzes')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        QuestionQuizUpdateRequest $request,
        QuestionQuiz $questionQuiz
    ): RedirectResponse {
        $this->authorize('update', $questionQuiz);

        $validated = $request->validated();

        $questionQuiz->update($validated);

        return redirect()
            ->route('question-quizs.edit', $questionQuiz)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        QuestionQuiz $questionQuiz
    ): RedirectResponse {
        $this->authorize('delete', $questionQuiz);

        $questionQuiz->delete();

        return redirect()
            ->route('question-quizs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
