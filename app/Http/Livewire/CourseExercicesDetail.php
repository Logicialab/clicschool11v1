<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Exercice;
use Illuminate\View\View;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseExercicesDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Course $course;
    public Exercice $exercice;
    public $exerciceFile;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Exercice';

    protected $rules = [
        'exercice.name' => ['required', 'max:255', 'string'],
        'exercice.description' => ['nullable', 'max:255', 'string'],
        'exercice.slug' => [
            'nullable',
            'unique:exercices,slug',
            'max:255',
            'string',
        ],
        'exercice.order' => ['nullable', 'numeric'],
        'exercice.active' => ['required', 'boolean'],
        'exerciceFile' => ['file', 'max:1024', 'nullable'],
    ];

    public function mount(Course $course): void
    {
        $this->course = $course;
        $this->resetExerciceData();
    }

    public function resetExerciceData(): void
    {
        $this->exercice = new Exercice();

        $this->exerciceFile = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newExercice(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.course_exercices.new_title');
        $this->resetExerciceData();

        $this->showModal();
    }

    public function editExercice(Exercice $exercice): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.course_exercices.edit_title');
        $this->exercice = $exercice;

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
        if (!$this->exercice->course_id) {
            $this->validate();
        } else {
            $this->validate([
                'exercice.name' => ['required', 'max:255', 'string'],
                'exercice.description' => ['nullable', 'max:255', 'string'],
                'exercice.slug' => [
                    'nullable',
                    Rule::unique('exercices', 'slug')->ignore($this->exercice),
                    'max:255',
                    'string',
                ],
                'exercice.order' => ['nullable', 'numeric'],
                'exercice.active' => ['required', 'boolean'],
                'exerciceFile' => ['file', 'max:1024', 'nullable'],
            ]);
        }

        if (!$this->exercice->course_id) {
            $this->authorize('create', Exercice::class);

            $this->exercice->course_id = $this->course->id;
        } else {
            $this->authorize('update', $this->exercice);
        }

        if ($this->exerciceFile) {
            $this->exercice->file = $this->exerciceFile->store('public');
        }

        $this->exercice->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Exercice::class);

        collect($this->selected)->each(function (string $id) {
            $exercice = Exercice::findOrFail($id);

            if ($exercice->file) {
                Storage::delete($exercice->file);
            }

            $exercice->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetExerciceData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->course->exercices as $exercice) {
            array_push($this->selected, $exercice->id);
        }
    }

    public function render(): View
    {
        return view('livewire.course-exercices-detail', [
            'exercices' => $this->course->exercices()->paginate(20),
        ]);
    }
}
