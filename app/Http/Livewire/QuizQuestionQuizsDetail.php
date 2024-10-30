<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Models\QuestionQuiz;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QuizQuestionQuizsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Quiz $quiz;
    public QuestionQuiz $questionQuiz;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New QuestionQuiz';

    protected $rules = [
        'questionQuiz.title' => ['required', 'max:255', 'string'],
        'questionQuiz.type' => ['required', 'max:255', 'string'],
    ];

    public function mount(Quiz $quiz): void
    {
        $this->quiz = $quiz;
        $this->resetQuestionQuizData();
    }

    public function resetQuestionQuizData(): void
    {
        $this->questionQuiz = new QuestionQuiz();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newQuestionQuiz(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.quiz_question_quizs.new_title');
        $this->resetQuestionQuizData();

        $this->showModal();
    }

    public function editQuestionQuiz(QuestionQuiz $questionQuiz): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.quiz_question_quizs.edit_title');
        $this->questionQuiz = $questionQuiz;

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

        if (!$this->questionQuiz->quiz_id) {
            $this->authorize('create', QuestionQuiz::class);

            $this->questionQuiz->quiz_id = $this->quiz->id;
        } else {
            $this->authorize('update', $this->questionQuiz);
        }

        $this->questionQuiz->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', QuestionQuiz::class);

        QuestionQuiz::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetQuestionQuizData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->quiz->questionQuizs as $questionQuiz) {
            array_push($this->selected, $questionQuiz->id);
        }
    }

    public function render(): View
    {
        return view('livewire.quiz-question-quizs-detail', [
            'questionQuizs' => $this->quiz->questionQuizs()->paginate(20),
        ]);
    }
}
