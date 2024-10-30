<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use App\Models\Course;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseQuizzesDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Course $course;
    public Quiz $quiz;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Quiz';

    protected $rules = [
        'quiz.name' => ['required', 'max:255', 'string'],
        'quiz.description' => ['nullable', 'max:255', 'string'],
        'quiz.slug' => ['nullable', 'unique:quizzes,slug', 'max:255', 'string'],
        'quiz.order' => ['nullable', 'numeric'],
        'quiz.active' => ['required', 'boolean'],
    ];

    public function mount(Course $course): void
    {
        $this->course = $course;
        $this->resetQuizData();
    }

    public function resetQuizData(): void
    {
        $this->quiz = new Quiz();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newQuiz(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.course_quizzes.new_title');
        $this->resetQuizData();

        $this->showModal();
    }

    public function editQuiz(Quiz $quiz): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.course_quizzes.edit_title');
        $this->quiz = $quiz;

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
        if (!$this->quiz->course_id) {
            $this->validate();
        } else {
            $this->validate([
                'quiz.name' => ['required', 'max:255', 'string'],
                'quiz.description' => ['nullable', 'max:255', 'string'],
                'quiz.slug' => [
                    'nullable',
                    Rule::unique('quizzes', 'slug')->ignore($this->quiz),
                    'max:255',
                    'string',
                ],
                'quiz.order' => ['nullable', 'numeric'],
                'quiz.active' => ['required', 'boolean'],
            ]);
        }

        if (!$this->quiz->course_id) {
            $this->authorize('create', Quiz::class);

            $this->quiz->course_id = $this->course->id;
        } else {
            $this->authorize('update', $this->quiz);
        }

        $this->quiz->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Quiz::class);

        Quiz::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetQuizData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->course->quizzes as $quiz) {
            array_push($this->selected, $quiz->id);
        }
    }

    public function render(): View
    {
        return view('livewire.course-quizzes-detail', [
            'quizzes' => $this->course->quizzes()->paginate(20),
        ]);
    }
}
