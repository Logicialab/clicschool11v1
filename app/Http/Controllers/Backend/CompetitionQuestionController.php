<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Models\CompetitionQuestion;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\CompetitionQuestionStoreRequest;
use App\Http\Requests\Backend\CompetitionQuestionUpdateRequest;

class CompetitionQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', CompetitionQuestion::class);

        $search = $request->get('search', '');

        $competitionQuestions = CompetitionQuestion::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.competition_questions.index',
            compact('competitionQuestions', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', CompetitionQuestion::class);

        $competitions = Competition::pluck('name', 'id');

        return view(
            'backend.competition_questions.create',
            compact('competitions')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        CompetitionQuestionStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', CompetitionQuestion::class);

        $validated = $request->validated();

        $competitionQuestion = CompetitionQuestion::create($validated);

        return redirect()
            ->route('competition-questions.edit', $competitionQuestion)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        CompetitionQuestion $competitionQuestion
    ): View {
        $this->authorize('view', $competitionQuestion);

        return view(
            'backend.competition_questions.show',
            compact('competitionQuestion')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        CompetitionQuestion $competitionQuestion
    ): View {
        $this->authorize('update', $competitionQuestion);

        $competitions = Competition::pluck('name', 'id');

        return view(
            'backend.competition_questions.edit',
            compact('competitionQuestion', 'competitions')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CompetitionQuestionUpdateRequest $request,
        CompetitionQuestion $competitionQuestion
    ): RedirectResponse {
        $this->authorize('update', $competitionQuestion);

        $validated = $request->validated();

        $competitionQuestion->update($validated);

        return redirect()
            ->route('competition-questions.edit', $competitionQuestion)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        CompetitionQuestion $competitionQuestion
    ): RedirectResponse {
        $this->authorize('delete', $competitionQuestion);

        $competitionQuestion->delete();

        return redirect()
            ->route('competition-questions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
