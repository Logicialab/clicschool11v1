<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Models\QuestionQuiz;
use App\Models\StudentAnswerQuiz;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StudentStudentAnswerQuizsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Student $student;
    public StudentAnswerQuiz $studentAnswerQuiz;
    public $questionQuizsForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New StudentAnswerQuiz';

    protected $rules = [
        'studentAnswerQuiz.questionQuiz_id' => [
            'required',
            'exists:question_quizs,id',
        ],
        'studentAnswerQuiz.text' => ['required', 'max:255', 'string'],
        'studentAnswerQuiz.is_correct' => ['nullable', 'boolean'],
    ];

    public function mount(Student $student): void
    {
        $this->student = $student;
        $this->questionQuizsForSelect = QuestionQuiz::pluck('title', 'id');
        $this->resetStudentAnswerQuizData();
    }

    public function resetStudentAnswerQuizData(): void
    {
        $this->studentAnswerQuiz = new StudentAnswerQuiz();

        $this->studentAnswerQuiz->questionQuiz_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newStudentAnswerQuiz(): void
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.student_student_answer_quizs.new_title'
        );
        $this->resetStudentAnswerQuizData();

        $this->showModal();
    }

    public function editStudentAnswerQuiz(
        StudentAnswerQuiz $studentAnswerQuiz
    ): void {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.student_student_answer_quizs.edit_title'
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

        if (!$this->studentAnswerQuiz->student_id) {
            $this->authorize('create', StudentAnswerQuiz::class);

            $this->studentAnswerQuiz->student_id = $this->student->id;
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

        foreach ($this->student->studentAnswerQuizs as $studentAnswerQuiz) {
            array_push($this->selected, $studentAnswerQuiz->id);
        }
    }

    public function render(): View
    {
        return view('livewire.student-student-answer-quizs-detail', [
            'studentAnswerQuizs' => $this->student
                ->studentAnswerQuizs()
                ->paginate(20),
        ]);
    }
}
