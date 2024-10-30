<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Models\QuestionQuiz;
use App\Models\StudentAnswerQuiz;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QuestionQuizStudentAnswerQuizsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public QuestionQuiz $questionQuiz;
    public StudentAnswerQuiz $studentAnswerQuiz;
    public $studentsForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New StudentAnswerQuiz';

    protected $rules = [
        'studentAnswerQuiz.student_id' => ['required', 'exists:students,id'],
        'studentAnswerQuiz.text' => ['required', 'max:255', 'string'],
        'studentAnswerQuiz.is_correct' => ['nullable', 'boolean'],
    ];

    public function mount(QuestionQuiz $questionQuiz): void
    {
        $this->questionQuiz = $questionQuiz;
        $this->studentsForSelect = Student::pluck('first_name', 'id');
        $this->resetStudentAnswerQuizData();
    }

    public function resetStudentAnswerQuizData(): void
    {
        $this->studentAnswerQuiz = new StudentAnswerQuiz();

        $this->studentAnswerQuiz->student_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newStudentAnswerQuiz(): void
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.question_quiz_student_answer_quizs.new_title'
        );
        $this->resetStudentAnswerQuizData();

        $this->showModal();
    }

    public function editStudentAnswerQuiz(
        StudentAnswerQuiz $studentAnswerQuiz
    ): void {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.question_quiz_student_answer_quizs.edit_title'
        );
        $this->studentAnswerQuiz = $studentAnswerQuiz;

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

        if (!$this->studentAnswerQuiz->questionQuiz_id) {
            $this->authorize('create', StudentAnswerQuiz::class);

            $this->studentAnswerQuiz->questionQuiz_id = $this->questionQuiz->id;
        } else {
            $this->authorize('update', $this->studentAnswerQuiz);
        }

        $this->studentAnswerQuiz->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', StudentAnswerQuiz::class);

        StudentAnswerQuiz::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetStudentAnswerQuizData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach (
            $this->questionQuiz->studentAnswerQuizs
            as $studentAnswerQuiz
        ) {
            array_push($this->selected, $studentAnswerQuiz->id);
        }
    }

    public function render(): View
    {
        return view('livewire.question-quiz-student-answer-quizs-detail', [
            'studentAnswerQuizs' => $this->questionQuiz
                ->studentAnswerQuizs()
                ->paginate(20),
        ]);
    }
}
