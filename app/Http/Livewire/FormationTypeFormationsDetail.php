<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Teacher;
use Illuminate\View\View;
use App\Models\Formation;
use Livewire\WithPagination;
use App\Models\FormationType;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FormationTypeFormationsDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public FormationType $formationType;
    public Formation $formation;
    public $teachersForSelect = [];
    public $formationImage;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Formation';

    protected $rules = [
        'formation.teacher_id' => ['required', 'exists:teachers,id'],
        'formation.name' => ['required', 'max:255', 'string'],
        'formation.description' => ['nullable', 'max:255', 'string'],
        'formationImage' => ['nullable', 'image', 'max:1024'],
        'formation.status' => ['nullable', 'max:255', 'string'],
        'formation.active' => ['required', 'boolean'],
        'formation.slug' => [
            'nullable',
            'unique:formations,slug',
            'max:255',
            'string',
        ],
    ];

    public function mount(FormationType $formationType): void
    {
        $this->formationType = $formationType;
        $this->teachersForSelect = Teacher::pluck('first_name', 'id');
        $this->resetFormationData();
    }

    public function resetFormationData(): void
    {
        $this->formation = new Formation();

        $this->formationImage = null;
        $this->formation->teacher_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newFormation(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.formation_type_formations.new_title');
        $this->resetFormationData();

        $this->showModal();
    }

    public function editFormation(Formation $formation): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.formation_type_formations.edit_title');
        $this->formation = $formation;

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
        if (!$this->formation->formation_type_id) {
            $this->validate();
        } else {
            $this->validate([
                'formation.teacher_id' => ['required', 'exists:teachers,id'],
                'formation.name' => ['required', 'max:255', 'string'],
                'formation.description' => ['nullable', 'max:255', 'string'],
                'formationImage' => ['nullable', 'image', 'max:1024'],
                'formation.status' => ['nullable', 'max:255', 'string'],
                'formation.active' => ['required', 'boolean'],
                'formation.slug' => [
                    'nullable',
                    Rule::unique('formations', 'slug')->ignore(
                        $this->formation
                    ),
                    'max:255',
                    'string',
                ],
            ]);
        }

        if (!$this->formation->formation_type_id) {
            $this->authorize('create', Formation::class);

            $this->formation->formation_type_id = $this->formationType->id;
        } else {
            $this->authorize('update', $this->formation);
        }

        if ($this->formationImage) {
            $this->formation->image = $this->formationImage->store('public');
        }

        $this->formation->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Formation::class);

        collect($this->selected)->each(function (string $id) {
            $formation = Formation::findOrFail($id);

            if ($formation->image) {
                Storage::delete($formation->image);
            }

            $formation->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetFormationData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->formationType->formations as $formation) {
            array_push($this->selected, $formation->id);
        }
    }

    public function render(): View
    {
        return view('livewire.formation-type-formations-detail', [
            'formations' => $this->formationType->formations()->paginate(20),
        ]);
    }
}
