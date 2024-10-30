<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Teacher;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Models\TeacherPayment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TeacherTeacherPaymentsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Teacher $teacher;
    public TeacherPayment $teacherPayment;
    public $teacherPaymentPaymentDate;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New TeacherPayment';

    protected $rules = [
        'teacherPayment.amount' => ['required', 'numeric'],
        'teacherPaymentPaymentDate' => ['required', 'date'],
        'teacherPayment.description' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(Teacher $teacher): void
    {
        $this->teacher = $teacher;
        $this->resetTeacherPaymentData();
    }

    public function resetTeacherPaymentData(): void
    {
        $this->teacherPayment = new TeacherPayment();

        $this->teacherPaymentPaymentDate = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newTeacherPayment(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.teacher_teacher_payments.new_title');
        $this->resetTeacherPaymentData();

        $this->showModal();
    }

    public function editTeacherPayment(TeacherPayment $teacherPayment): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.teacher_teacher_payments.edit_title');
        $this->teacherPayment = $teacherPayment;

        $this->teacherPaymentPaymentDate = optional(
            $this->teacherPayment->payment_date
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

        if (!$this->teacherPayment->teacher_id) {
            $this->authorize('create', TeacherPayment::class);

            $this->teacherPayment->teacher_id = $this->teacher->id;
        } else {
            $this->authorize('update', $this->teacherPayment);
        }

        $this->teacherPayment->payment_date = \Carbon\Carbon::make(
            $this->teacherPaymentPaymentDate
        );

        $this->teacherPayment->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', TeacherPayment::class);

        TeacherPayment::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetTeacherPaymentData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->teacher->teacherPayments as $teacherPayment) {
            array_push($this->selected, $teacherPayment->id);
        }
    }

    public function render(): View
    {
        return view('livewire.teacher-teacher-payments-detail', [
            'teacherPayments' => $this->teacher
                ->teacherPayments()
                ->paginate(20),
        ]);
    }
}
