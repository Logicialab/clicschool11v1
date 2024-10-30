<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\View\View;
use App\Models\Formation;
use Livewire\WithPagination;
use App\Models\FormationParticipant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FormationFormationParticipantsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Formation $formation;
    public FormationParticipant $formationParticipant;
    public $studentsForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New FormationParticipant';

    protected $rules = [
        'formationParticipant.student_id' => ['required', 'exists:students,id'],
        'formationParticipant.time' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(Formation $formation): void
    {
        $this->formation = $formation;
        $this->studentsForSelect = Student::pluck('first_name', 'id');
        $this->resetFormationParticipantData();
    }

    public function resetFormationParticipantData(): void
    {
        $this->formationParticipant = new FormationParticipant();

        $this->formationParticipant->student_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newFormationParticipant(): void
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.formation_formation_participants.new_title'
        );
        $this->resetFormationParticipantData();

        $this->showModal();
    }

    public function editFormationParticipant(
        FormationParticipant $formationParticipant
    ): void {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.formation_formation_participants.edit_title'
        );
        $this->formationParticipant = $formationParticipant;

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

        if (!$this->formationParticipant->formation_id) {
            $this->authorize('create', FormationParticipant::class);

            $this->formationParticipant->formation_id = $this->formation->id;
        } else {
            $this->authorize('update', $this->formationParticipant);
        }

        $this->formationParticipant->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', FormationParticipant::class);

        FormationParticipant::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetFormationParticipantData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach (
            $this->formation->formationParticipants
            as $formationParticipant
        ) {
            array_push($this->selected, $formationParticipant->id);
        }
    }

    public function render(): View
    {
        return view('livewire.formation-formation-participants-detail', [
            'formationParticipants' => $this->formation
                ->formationParticipants()
                ->paginate(20),
        ]);
    }
}
