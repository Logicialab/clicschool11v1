<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\AnswerQuiz;
use Livewire\WithPagination;
use App\Models\QuestionQuiz;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QuestionQuizAnswerQuizsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public QuestionQuiz $questionQuiz;
    public AnswerQuiz $answerQuiz;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New AnswerQuiz';

    protected $rules = [
        'answerQuiz.text' => ['required', 'max:255', 'string'],
    ];

    public function mount(QuestionQuiz $questionQuiz): void
    {
        $this->questionQuiz = $questionQuiz;
        $this->resetAnswerQuizData();
    }

    public function resetAnswerQuizData(): void
    {
        $this->answerQuiz = new AnswerQuiz();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newAnswerQuiz(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.question_quiz_answer_quizs.new_title');
        $this->resetAnswerQuizData();

        $this->showModal();
    }

    public function editAnswerQuiz(AnswerQuiz $answerQuiz): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.question_quiz_answer_quizs.edit_title');
        $this->answerQuiz = $answerQuiz;

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

        if (!$this->answerQuiz->questionQuiz_id) {
            $this->authorize('create', AnswerQuiz::class);

            $this->answerQuiz->questionQuiz_id = $this->questionQuiz->id;
        } else {
            $this->authorize('update', $this->answerQuiz);
        }

        $this->answerQuiz->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', AnswerQuiz::class);

        AnswerQuiz::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetAnswerQuizData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->questionQuiz->answerQuizs as $answerQuiz) {
            array_push($this->selected, $answerQuiz->id);
        }
    }

    public function render(): View
    {
        return view('livewire.question-quiz-answer-quizs-detail', [
            'answerQuizs' => $this->questionQuiz->answerQuizs()->paginate(20),
        ]);
    }
}
