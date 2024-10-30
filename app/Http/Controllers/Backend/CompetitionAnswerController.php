<?php

namespace App\Http\Controllers\Backend;

use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\CompetitionAnswer;
use App\Models\CompetitionQuestion;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\CompetitionAnswerStoreRequest;
use App\Http\Requests\Backend\CompetitionAnswerUpdateRequest;

class CompetitionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', CompetitionAnswer::class);

        $search = $request->get('search', '');

        $competitionAnswers = CompetitionAnswer::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.competition_answers.index',
            compact('competitionAnswers', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', CompetitionAnswer::class);

        $competitionQuestions = CompetitionQuestion::pluck('question', 'id');
        $students = Student::pluck('first_name', 'id');

        return view(
            'backend.competition_answers.create',
            compact('competitionQuestions', 'students')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        CompetitionAnswerStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', CompetitionAnswer::class);

        $validated = $request->validated();

        $competitionAnswer = CompetitionAnswer::create($validated);

        return redirect()
            ->route('competition-answers.edit', $competitionAnswer)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        CompetitionAnswer $competitionAnswer
    ): View {
        $this->authorize('view', $competitionAnswer);

        return view(
            'backend.competition_answers.show',
            compact('competitionAnswer')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        CompetitionAnswer $competitionAnswer
    ): View {
        $this->authorize('update', $competitionAnswer);

        $competitionQuestions = CompetitionQuestion::pluck('question', 'id');
        $students = Student::pluck('first_name', 'id');

        return view(
            'backend.competition_answers.edit',
            compact('competitionAnswer', 'competitionQuestions', 'students')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CompetitionAnswerUpdateRequest $request,
        CompetitionAnswer $competitionAnswer
    ): RedirectResponse {
        $this->authorize('update', $competitionAnswer);

        $validated = $request->validated();

        $competitionAnswer->update($validated);

        return redirect()
            ->route('competition-answers.edit', $competitionAnswer)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        CompetitionAnswer $competitionAnswer
    ): RedirectResponse {
        $this->authorize('delete', $competitionAnswer);

        $competitionAnswer->delete();

        return redirect()
            ->route('competition-answers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
