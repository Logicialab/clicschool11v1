<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exercice;
use Illuminate\View\View;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\ExerciseSolution;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ExerciceExerciseSolutionsDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Exercice $exercice;
    public ExerciseSolution $exerciseSolution;
    public $exerciseSolutionFile;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New ExerciseSolution';

    protected $rules = [
        'exerciseSolution.solution' => ['required', 'max:255', 'string'],
        'exerciseSolutionFile' => ['file', 'max:1024', 'nullable'],
        'exerciseSolution.active' => ['required', 'boolean'],
    ];

    public function mount(Exercice $exercice): void
    {
        $this->exercice = $exercice;
        $this->resetExerciseSolutionData();
    }

    public function resetExerciseSolutionData(): void
    {
        $this->exerciseSolution = new ExerciseSolution();

        $this->exerciseSolutionFile = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newExerciseSolution(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.exercice_exercise_solutions.new_title');
        $this->resetExerciseSolutionData();

        $this->showModal();
    }

    public function editExerciseSolution(
        ExerciseSolution $exerciseSolution
    ): void {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.exercice_exercise_solutions.edit_title'
        );
        $this->exerciseSolution = $exerciseSolution;

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

        if (!$this->exerciseSolution->exercice_id) {
            $this->authorize('create', ExerciseSolution::class);

            $this->exerciseSolution->exercice_id = $this->exercice->id;
        } else {
            $this->authorize('update', $this->exerciseSolution);
        }

        if ($this->exerciseSolutionFile) {
            $this->exerciseSolution->file = $this->exerciseSolutionFile->store(
                'public'
            );
        }

        $this->exerciseSolution->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', ExerciseSolution::class);

        collect($this->selected)->each(function (string $id) {
            $exerciseSolution = ExerciseSolution::findOrFail($id);

            if ($exerciseSolution->file) {
                Storage::delete($exerciseSolution->file);
            }

            $exerciseSolution->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetExerciseSolutionData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->exercice->exerciseSolutions as $exerciseSolution) {
            array_push($this->selected, $exerciseSolution->id);
        }
    }

    public function render(): View
    {
        return view('livewire.exercice-exercise-solutions-detail', [
            'exerciseSolutions' => $this->exercice
                ->exerciseSolutions()
                ->paginate(20),
        ]);
    }
}
