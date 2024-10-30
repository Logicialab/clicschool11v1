<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Formation;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\FormationDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FormationFormationDetailsDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Formation $formation;
    public FormationDetail $formationDetail;
    public $formationDetailFile;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New FormationDetail';

    protected $rules = [
        'formationDetail.title' => ['nullable', 'max:255', 'string'],
        'formationDetail.url' => ['nullable', 'url'],
        'formationDetail.description' => ['nullable', 'max:255', 'string'],
        'formationDetailFile' => ['nullable', 'file'],
    ];

    public function mount(Formation $formation): void
    {
        $this->formation = $formation;
        $this->resetFormationDetailData();
    }

    public function resetFormationDetailData(): void
    {
        $this->formationDetail = new FormationDetail();

        $this->formationDetailFile = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newFormationDetail(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.formation_formation_details.new_title');
        $this->resetFormationDetailData();

        $this->showModal();
    }

    public function editFormationDetail(FormationDetail $formationDetail): void
    {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.formation_formation_details.edit_title'
        );
        $this->formationDetail = $formationDetail;

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

        if (!$this->formationDetail->formation_id) {
            $this->authorize('create', FormationDetail::class);

            $this->formationDetail->formation_id = $this->formation->id;
        } else {
            $this->authorize('update', $this->formationDetail);
        }

        if ($this->formationDetailFile) {
            $this->formationDetail->file = $this->formationDetailFile->store(
                'public'
            );
        }

        $this->formationDetail->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', FormationDetail::class);

        collect($this->selected)->each(function (string $id) {
            $formationDetail = FormationDetail::findOrFail($id);

            if ($formationDetail->file) {
                Storage::delete($formationDetail->file);
            }

            $formationDetail->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetFormationDetailData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->formation->formationDetails as $formationDetail) {
            array_push($this->selected, $formationDetail->id);
        }
    }

    public function render(): View
    {
        return view('livewire.formation-formation-details-detail', [
            'formationDetails' => $this->formation
                ->formationDetails()
                ->paginate(20),
        ]);
    }
}
