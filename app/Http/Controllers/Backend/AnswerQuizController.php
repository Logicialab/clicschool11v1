<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Models\AnswerQuiz;
use Illuminate\Http\Request;
use App\Models\QuestionQuiz;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\AnswerQuizStoreRequest;
use App\Http\Requests\Backend\AnswerQuizUpdateRequest;

class AnswerQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', AnswerQuiz::class);

        $search = $request->get('search', '');

        $answerQuizs = AnswerQuiz::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.answer_quizs.index',
            compact('answerQuizs', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', AnswerQuiz::class);

        $questionQuizs = QuestionQuiz::pluck('title', 'id');

        return view('backend.answer_quizs.create', compact('questionQuizs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswerQuizStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', AnswerQuiz::class);

        $validated = $request->validated();

        $answerQuiz = AnswerQuiz::create($validated);

        return redirect()
            ->route('answer-quizs.edit', $answerQuiz)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, AnswerQuiz $answerQuiz): View
    {
        $this->authorize('view', $answerQuiz);

        return view('backend.answer_quizs.show', compact('answerQuiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, AnswerQuiz $answerQuiz): View
    {
        $this->authorize('update', $answerQuiz);

        $questionQuizs = QuestionQuiz::pluck('title', 'id');

        return view(
            'backend.answer_quizs.edit',
            compact('answerQuiz', 'questionQuizs')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AnswerQuizUpdateRequest $request,
        AnswerQuiz $answerQuiz
    ): RedirectResponse {
        $this->authorize('update', $answerQuiz);

        $validated = $request->validated();

        $answerQuiz->update($validated);

        return redirect()
            ->route('answer-quizs.edit', $answerQuiz)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        AnswerQuiz $answerQuiz
    ): RedirectResponse {
        $this->authorize('delete', $answerQuiz);

        $answerQuiz->delete();

        return redirect()
            ->route('answer-quizs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
