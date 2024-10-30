<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Parente;
use App\Models\Student;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Models\ParentStudent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ParenteParentStudentsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Parente $parente;
    public ParentStudent $parentStudent;
    public $studentsForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New ParentStudent';

    protected $rules = [
        'parentStudent.student_id' => ['required', 'exists:students,id'],
    ];

    public function mount(Parente $parente): void
    {
        $this->parente = $parente;
        $this->studentsForSelect = Student::pluck('first_name', 'id');
        $this->resetParentStudentData();
    }

    public function resetParentStudentData(): void
    {
        $this->parentStudent = new ParentStudent();

        $this->parentStudent->student_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newParentStudent(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.parente_parent_students.new_title');
        $this->resetParentStudentData();

        $this->showModal();
    }

    public function editParentStudent(ParentStudent $parentStudent): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.parente_parent_students.edit_title');
        $this->parentStudent = $parentStudent;

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

        if (!$this->parentStudent->parente_id) {
            $this->authorize('create', ParentStudent::class);

            $this->parentStudent->parente_id = $this->parente->id;
        } else {
            $this->authorize('update', $this->parentStudent);
        }

        $this->parentStudent->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', ParentStudent::class);

        ParentStudent::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetParentStudentData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->parente->parentStudents as $parentStudent) {
            array_push($this->selected, $parentStudent->id);
        }
    }

    public function render(): View
    {
        return view('livewire.parente-parent-students-detail', [
            'parentStudents' => $this->parente->parentStudents()->paginate(20),
        ]);
    }
}
