<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Models\CompetitionAnswer;
use App\Models\CompetitionQuestion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CompetitionQuestionCompetitionAnswersDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public CompetitionQuestion $competitionQuestion;
    public CompetitionAnswer $competitionAnswer;
    public $studentsForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New CompetitionAnswer';

    protected $rules = [
        'competitionAnswer.student_id' => ['required', 'exists:students,id'],
        'competitionAnswer.text' => ['required', 'max:255', 'string'],
        'competitionAnswer.is_correct' => ['nullable', 'boolean'],
    ];

    public function mount(CompetitionQuestion $competitionQuestion): void
    {
        $this->competitionQuestion = $competitionQuestion;
        $this->studentsForSelect = Student::pluck('first_name', 'id');
        $this->resetCompetitionAnswerData();
    }

    public function resetCompetitionAnswerData(): void
    {
        $this->competitionAnswer = new CompetitionAnswer();

        $this->competitionAnswer->student_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newCompetitionAnswer(): void
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.competition_question_competition_answers.new_title'
        );
        $this->resetCompetitionAnswerData();

        $this->showModal();
    }

    public function editCompetitionAnswer(
        CompetitionAnswer $competitionAnswer
    ): void {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.competition_question_competition_answers.edit_title'
        );
        $this->competitionAnswer = $competitionAnswer;

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

        if (!$this->competitionAnswer->competition_question_id) {
            $this->authorize('create', CompetitionAnswer::class);

            $this->competitionAnswer->competition_question_id =
                $this->competitionQuestion->id;
        } else {
            $this->authorize('update', $this->competitionAnswer);
        }

        $this->competitionAnswer->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', CompetitionAnswer::class);

        CompetitionAnswer::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetCompetitionAnswerData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach (
            $this->competitionQuestion->competitionAnswers
            as $competitionAnswer
        ) {
            array_push($this->selected, $competitionAnswer->id);
        }
    }

    public function render(): View
    {
        return view(
            'livewire.competition-question-competition-answers-detail',
            [
                'competitionAnswers' => $this->competitionQuestion
                    ->competitionAnswers()
                    ->paginate(20),
            ]
        );
    }
}
