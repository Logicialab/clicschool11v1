<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Competition;
use Livewire\WithPagination;
use App\Models\CompetitionQuestion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CompetitionCompetitionQuestionsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Competition $competition;
    public CompetitionQuestion $competitionQuestion;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New CompetitionQuestion';

    protected $rules = [
        'competitionQuestion.question' => ['required', 'max:255', 'string'],
        'competitionQuestion.question_type' => [
            'required',
            'max:255',
            'string',
        ],
    ];

    public function mount(Competition $competition): void
    {
        $this->competition = $competition;
        $this->resetCompetitionQuestionData();
    }

    public function resetCompetitionQuestionData(): void
    {
        $this->competitionQuestion = new CompetitionQuestion();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newCompetitionQuestion(): void
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.competition_competition_questions.new_title'
        );
        $this->resetCompetitionQuestionData();

        $this->showModal();
    }

    public function editCompetitionQuestion(
        CompetitionQuestion $competitionQuestion
    ): void {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.competition_competition_questions.edit_title'
        );
        $this->competitionQuestion = $competitionQuestion;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        if (!$this->competitionQuestion->competition_id) {
            $this->authorize('create', CompetitionQuestion::class);

            $this->competitionQuestion->competition_id = $this->competition->id;
        } else {
            $this->authorize('update', $this->competitionQuestion);
        }

        $this->competitionQuestion->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', CompetitionQuestion::class);

        CompetitionQuestion::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetCompetitionQuestionData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach (
            $this->competition->competitionQuestions
            as $competitionQuestion
        ) {
            array_push($this->selected, $competitionQuestion->id);
        }
    }

    public function render(): View
    {
        return view('livewire.competition-competition-questions-detail', [
            'competitionQuestions' => $this->competition
                ->competitionQuestions()
                ->paginate(20),
        ]);
    }
}
