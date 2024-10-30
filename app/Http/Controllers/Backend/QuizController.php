<?php

namespace App\Http\Controllers\Backend;

use App\Models\Quiz;
use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\QuizStoreRequest;
use App\Http\Requests\Backend\QuizUpdateRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Quiz::class);

        $search = $request->get('search', '');

        $quizzes = Quiz::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.quizzes.index', compact('quizzes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Quiz::class);

        $courses = Course::pluck('title', 'id');

        return view('backend.quizzes.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Quiz::class);

        $validated = $request->validated();

        $quiz = Quiz::create($validated);

        return redirect()
            ->route('quizzes.edit', $quiz)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Quiz $quiz): View
    {
        $this->authorize('view', $quiz);

        return view('backend.quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Quiz $quiz): View
    {
        $this->authorize('update', $quiz);

        $courses = Course::pluck('title', 'id');

        return view('backend.quizzes.edit', compact('quiz', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        QuizUpdateRequest $request,
        Quiz $quiz
    ): RedirectResponse {
        $this->authorize('update', $quiz);

        $validated = $request->validated();

        $quiz->update($validated);

        return redirect()
            ->route('quizzes.edit', $quiz)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Quiz $quiz): RedirectResponse
    {
        $this->authorize('delete', $quiz);

        $quiz->delete();

        return redirect()
            ->route('quizzes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
