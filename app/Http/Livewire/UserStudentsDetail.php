<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Classe;
use Livewire\Component;
use App\Models\Student;
use Illuminate\View\View;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserStudentsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public User $user;
    public Student $student;
    public $classesForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Student';

    protected $rules = [
        'student.classe_id' => ['required', 'exists:classes,id'],
        'student.first_name' => ['required', 'max:255', 'string'],
        'student.last_name' => ['required', 'max:255', 'string'],
        'student.slug' => [
            'nullable',
            'unique:students,slug',
            'max:255',
            'string',
        ],
        'student.nickname' => ['nullable', 'max:255', 'string'],
        'student.home_adress' => ['nullable', 'max:255', 'string'],
        'student.street' => ['nullable', 'max:255', 'string'],
        'student.neighborhood' => ['nullable', 'max:255', 'string'],
        'student.city' => ['nullable', 'max:255', 'string'],
        'student.school_name' => ['nullable', 'max:255', 'string'],
        'student.student_level' => ['nullable', 'max:255', 'string'],
        'student.name_guardian' => ['nullable', 'max:255', 'string'],
        'student.Profession' => ['nullable', 'max:255', 'string'],
        'student.etablissement_travail' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->classesForSelect = Classe::pluck('name', 'id');
        $this->resetStudentData();
    }

    public function resetStudentData(): void
    {
        $this->student = new Student();

        $this->student->classe_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newStudent(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.user_students.new_title');
        $this->resetStudentData();

        $this->showModal();
    }

    public function editStudent(Student $student): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.user_students.edit_title');
        $this->student = $student;

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
        if (!$this->student->user_id) {
            $this->validate();
        } else {
            $this->validate([
                'student.classe_id' => ['required', 'exists:classes,id'],
                'student.first_name' => ['required', 'max:255', 'string'],
                'student.last_name' => ['required', 'max:255', 'string'],
                'student.slug' => [
                    'nullable',
                    Rule::unique('students', 'slug')->ignore($this->student),
                    'max:255',
                    'string',
                ],
                'student.nickname' => ['nullable', 'max:255', 'string'],
                'student.home_adress' => ['nullable', 'max:255', 'string'],
                'student.street' => ['nullable', 'max:255', 'string'],
                'student.neighborhood' => ['nullable', 'max:255', 'string'],
                'student.city' => ['nullable', 'max:255', 'string'],
                'student.school_name' => ['nullable', 'max:255', 'string'],
                'student.student_level' => ['nullable', 'max:255', 'string'],
                'student.name_guardian' => ['nullable', 'max:255', 'string'],
                'student.Profession' => ['nullable', 'max:255', 'string'],
                'student.etablissement_travail' => [
                    'nullable',
                    'max:255',
                    'string',
                ],
            ]);
        }

        if (!$this->student->user_id) {
            $this->authorize('create', Student::class);

            $this->student->user_id = $this->user->id;
        } else {
            $this->authorize('update', $this->student);
        }

        $this->student->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Student::class);

        Student::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetStudentData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->user->students as $student) {
            array_push($this->selected, $student->id);
        }
    }

    public function render(): View
    {
        return view('livewire.user-students-detail', [
            'students' => $this->user->students()->paginate(20),
        ]);
    }
}
