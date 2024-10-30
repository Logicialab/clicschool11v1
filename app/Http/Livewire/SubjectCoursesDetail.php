<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\View\View;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubjectCoursesDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Subject $subject;
    public Course $course;
    public $teachersForSelect = [];
    public $courseImage;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Course';

    protected $rules = [
        'course.title' => ['required', 'max:255', 'string'],
        'course.slug' => [
            'nullable',
            'unique:courses,slug',
            'max:255',
            'string',
        ],
        'course.description' => ['nullable', 'max:255', 'string'],
        'courseImage' => ['nullable', 'image', 'max:1024'],
        'course.body' => ['required', 'max:255', 'string'],
        'course.order' => ['nullable', 'numeric'],
        'course.teacher_id' => ['required', 'exists:teachers,id'],
        'course.active' => ['nullable', 'boolean'],
    ];

    public function mount(Subject $subject): void
    {
        $this->subject = $subject;
        $this->teachersForSelect = Teacher::pluck('first_name', 'id');
        $this->resetCourseData();
    }

    public function resetCourseData(): void
    {
        $this->course = new Course();

        $this->courseImage = null;
        $this->course->teacher_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newCourse(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.subject_courses.new_title');
        $this->resetCourseData();

        $this->showModal();
    }

    public function editCourse(Course $course): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.subject_courses.edit_title');
        $this->course = $course;

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
        if (!$this->course->subject_id) {
            $this->validate();
        } else {
            $this->validate([
                'course.title' => ['required', 'max:255', 'string'],
                'course.slug' => [
                    'nullable',
                    Rule::unique('courses', 'slug')->ignore($this->course),
                    'max:255',
                    'string',
                ],
                'course.description' => ['nullable', 'max:255', 'string'],
                'courseImage' => ['nullable', 'image', 'max:1024'],
                'course.body' => ['required', 'max:255', 'string'],
                'course.order' => ['nullable', 'numeric'],
                'course.teacher_id' => ['required', 'exists:teachers,id'],
                'course.active' => ['nullable', 'boolean'],
            ]);
        }

        if (!$this->course->subject_id) {
            $this->authorize('create', Course::class);

            $this->course->subject_id = $this->subject->id;
        } else {
            $this->authorize('update', $this->course);
        }

        if ($this->courseImage) {
            $this->course->image = $this->courseImage->store('public');
        }

        $this->course->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Course::class);

        collect($this->selected)->each(function (string $id) {
            $course = Course::findOrFail($id);

            if ($course->image) {
                Storage::delete($course->image);
            }

            $course->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetCourseData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->subject->courses as $course) {
            array_push($this->selected, $course->id);
        }
    }

    public function render(): View
    {
        return view('livewire.subject-courses-detail', [
            'courses' => $this->subject->courses()->paginate(20),
        ]);
    }
}
