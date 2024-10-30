<?php

namespace App\Http\Livewire;

use App\Models\Live;
use Livewire\Component;
use App\Models\Student;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Models\LiveParticipant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LiveLiveParticipantsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Live $live;
    public LiveParticipant $liveParticipant;
    public $studentsForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New LiveParticipant';

    protected $rules = [
        'liveParticipant.student_id' => ['required', 'exists:students,id'],
    ];

    public function mount(Live $live): void
    {
        $this->live = $live;
        $this->studentsForSelect = Student::pluck('first_name', 'id');
        $this->resetLiveParticipantData();
    }

    public function resetLiveParticipantData(): void
    {
        $this->liveParticipant = new LiveParticipant();

        $this->liveParticipant->student_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newLiveParticipant(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.live_live_participants.new_title');
        $this->resetLiveParticipantData();

        $this->showModal();
    }

    public function editLiveParticipant(LiveParticipant $liveParticipant): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.live_live_participants.edit_title');
        $this->liveParticipant = $liveParticipant;

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

        if (!$this->liveParticipant->live_id) {
            $this->authorize('create', LiveParticipant::class);

            $this->liveParticipant->live_id = $this->live->id;
        } else {
            $this->authorize('update', $this->liveParticipant);
        }

        $this->liveParticipant->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', LiveParticipant::class);

        LiveParticipant::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetLiveParticipantData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->live->liveParticipants as $liveParticipant) {
            array_push($this->selected, $liveParticipant->id);
        }
    }

    public function render(): View
    {
        return view('livewire.live-live-participants-detail', [
            'liveParticipants' => $this->live->liveParticipants()->paginate(20),
        ]);
    }
}
