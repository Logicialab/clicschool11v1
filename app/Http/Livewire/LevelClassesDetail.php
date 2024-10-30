<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\Classe;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LevelClassesDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Level $level;
    public Classe $classe;
    public $classeImage;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Classe';

    protected $rules = [
        'classe.name' => ['required', 'max:255', 'string'],
        'classe.slug' => [
            'nullable',
            'unique:classes,slug',
            'max:255',
            'string',
        ],
        'classe.description' => ['nullable', 'max:255', 'string'],
        'classeImage' => ['nullable', 'image', 'max:1024'],
        'classe.annee_scolaire' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(Level $level): void
    {
        $this->level = $level;
        $this->resetClasseData();
    }

    public function resetClasseData(): void
    {
        $this->classe = new Classe();

        $this->classeImage = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newClasse(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.level_classes.new_title');
        $this->resetClasseData();

        $this->showModal();
    }

    public function editClasse(Classe $classe): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.level_classes.edit_title');
        $this->classe = $classe;

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
        if (!$this->classe->level_id) {
            $this->validate();
        } else {
            $this->validate([
                'classe.name' => ['required', 'max:255', 'string'],
                'classe.slug' => [
                    'nullable',
                    Rule::unique('classes', 'slug')->ignore($this->classe),
                    'max:255',
                    'string',
                ],
                'classe.description' => ['nullable', 'max:255', 'string'],
                'classeImage' => ['nullable', 'image', 'max:1024'],
                'classe.annee_scolaire' => ['nullable', 'max:255', 'string'],
            ]);
        }

        if (!$this->classe->level_id) {
            $this->authorize('create', Classe::class);

            $this->classe->level_id = $this->level->id;
        } else {
            $this->authorize('update', $this->classe);
        }

        if ($this->classeImage) {
            $this->classe->image = $this->classeImage->store('public');
        }

        $this->classe->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Classe::class);

        collect($this->selected)->each(function (string $id) {
            $classe = Classe::findOrFail($id);

            if ($classe->image) {
                Storage::delete($classe->image);
            }

            $classe->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetClasseData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->level->classes as $classe) {
            array_push($this->selected, $classe->id);
        }
    }

    public function render(): View
    {
        return view('livewire.level-classes-detail', [
            'classes' => $this->level->classes()->paginate(20),
        ]);
    }
}
