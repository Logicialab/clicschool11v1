<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Teacher;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Models\TeacherSalary;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TeacherTeacherSalariesDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Teacher $teacher;
    public TeacherSalary $teacherSalary;
    public $teacherSalaryPaidAt;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New TeacherSalary';

    protected $rules = [
        'teacherSalary.montly_salary' => ['required', 'numeric'],
        'teacherSalaryPaidAt' => ['required', 'date'],
        'teacherSalary.status' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(Teacher $teacher): void
    {
        $this->teacher = $teacher;
        $this->resetTeacherSalaryData();
    }

    public function resetTeacherSalaryData(): void
    {
        $this->teacherSalary = new TeacherSalary();

        $this->teacherSalaryPaidAt = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newTeacherSalary(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.teacher_teacher_salaries.new_title');
        $this->resetTeacherSalaryData();

        $this->showModal();
    }

    public function editTeacherSalary(TeacherSalary $teacherSalary): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.teacher_teacher_salaries.edit_title');
        $this->teacherSalary = $teacherSalary;

        $this->teacherSalaryPaidAt = optional(
            $this->teacherSalary->paid_at
        )->format('Y-m-d');

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

        if (!$this->teacherSalary->teacher_id) {
            $this->authorize('create', TeacherSalary::class);

            $this->teacherSalary->teacher_id = $this->teacher->id;
        } else {
            $this->authorize('update', $this->teacherSalary);
        }

        $this->teacherSalary->paid_at = \Carbon\Carbon::make(
            $this->teacherSalaryPaidAt
        );

        $this->teacherSalary->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', TeacherSalary::class);

        TeacherSalary::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetTeacherSalaryData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->teacher->teacherSalaries as $teacherSalary) {
            array_push($this->selected, $teacherSalary->id);
        }
    }

    public function render(): View
    {
        return view('livewire.teacher-teacher-salaries-detail', [
            'teacherSalaries' => $this->teacher
                ->teacherSalaries()
                ->paginate(20),
        ]);
    }
}
