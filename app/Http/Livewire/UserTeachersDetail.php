<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Teacher;
use Illuminate\View\View;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserTeachersDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public User $user;
    public Teacher $teacher;
    public $teacherImage;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Teacher';

    protected $rules = [
        'teacher.first_name' => ['required', 'max:255', 'string'],
        'teacher.last_name' => ['required', 'max:255', 'string'],
        'teacher.bio' => ['nullable', 'max:255', 'string'],
        'teacherImage' => ['nullable', 'image', 'max:1024'],
        'teacher.salaire' => ['nullable', 'numeric'],
        'teacher.slug' => [
            'nullable',
            'unique:teachers,slug',
            'max:255',
            'string',
        ],
        'teacher.school_name' => ['nullable', 'max:255', 'string'],
        'teacher.specialite' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->resetTeacherData();
    }

    public function resetTeacherData(): void
    {
        $this->teacher = new Teacher();

        $this->teacherImage = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newTeacher(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.user_teachers.new_title');
        $this->resetTeacherData();

        $this->showModal();
    }

    public function editTeacher(Teacher $teacher): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.user_teachers.edit_title');
        $this->teacher = $teacher;

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
        if (!$this->teacher->user_id) {
            $this->validate();
        } else {
            $this->validate([
                'teacher.first_name' => ['required', 'max:255', 'string'],
                'teacher.last_name' => ['required', 'max:255', 'string'],
                'teacher.bio' => ['nullable', 'max:255', 'string'],
                'teacherImage' => ['nullable', 'image', 'max:1024'],
                'teacher.salaire' => ['nullable', 'numeric'],
                'teacher.slug' => [
                    'nullable',
                    Rule::unique('teachers', 'slug')->ignore($this->teacher),
                    'max:255',
                    'string',
                ],
                'teacher.school_name' => ['nullable', 'max:255', 'string'],
                'teacher.specialite' => ['nullable', 'max:255', 'string'],
            ]);
        }

        if (!$this->teacher->user_id) {
            $this->authorize('create', Teacher::class);

            $this->teacher->user_id = $this->user->id;
        } else {
            $this->authorize('update', $this->teacher);
        }

        if ($this->teacherImage) {
            $this->teacher->image = $this->teacherImage->store('public');
        }

        $this->teacher->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Teacher::class);

        collect($this->selected)->each(function (string $id) {
            $teacher = Teacher::findOrFail($id);

            if ($teacher->image) {
                Storage::delete($teacher->image);
            }

            $teacher->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetTeacherData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->user->teachers as $teacher) {
            array_push($this->selected, $teacher->id);
        }
    }

    public function render(): View
    {
        return view('livewire.user-teachers-detail', [
            'teachers' => $this->user->teachers()->paginate(20),
        ]);
    }
}
