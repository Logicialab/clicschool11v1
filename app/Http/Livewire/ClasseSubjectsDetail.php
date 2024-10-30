<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\Subject;
use Illuminate\View\View;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ClasseSubjectsDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Classe $classe;
    public Subject $subject;
    public $subjectImage;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Subject';

    protected $rules = [
        'subject.name' => ['required', 'max:255', 'string'],
        'subject.description' => ['nullable', 'max:255', 'string'],
        'subject.slug' => [
            'nullable',
            'unique:subjects,slug',
            'max:255',
            'string',
        ],
        'subjectImage' => ['nullable', 'image', 'max:1024'],
    ];

    public function mount(Classe $classe): void
    {
        $this->classe = $classe;
        $this->resetSubjectData();
    }

    public function resetSubjectData(): void
    {
        $this->subject = new Subject();

        $this->subjectImage = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newSubject(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.classe_subjects.new_title');
        $this->resetSubjectData();

        $this->showModal();
    }

    public function editSubject(Subject $subject): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.classe_subjects.edit_title');
        $this->subject = $subject;

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
        if (!$this->subject->classe_id) {
            $this->validate();
        } else {
            $this->validate([
                'subject.name' => ['required', 'max:255', 'string'],
                'subject.description' => ['nullable', 'max:255', 'string'],
                'subject.slug' => [
                    'nullable',
                    Rule::unique('subjects', 'slug')->ignore($this->subject),
                    'max:255',
                    'string',
                ],
                'subjectImage' => ['nullable', 'image', 'max:1024'],
            ]);
        }

        if (!$this->subject->classe_id) {
            $this->authorize('create', Subject::class);

            $this->subject->classe_id = $this->classe->id;
        } else {
            $this->authorize('update', $this->subject);
        }

        if ($this->subjectImage) {
            $this->subject->image = $this->subjectImage->store('public');
        }

        $this->subject->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Subject::class);

        collect($this->selected)->each(function (string $id) {
            $subject = Subject::findOrFail($id);

            if ($subject->image) {
                Storage::delete($subject->image);
            }

            $subject->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetSubjectData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->classe->subjects as $subject) {
            array_push($this->selected, $subject->id);
        }
    }

    public function render(): View
    {
        return view('livewire.classe-subjects-detail', [
            'subjects' => $this->classe->subjects()->paginate(20),
        ]);
    }
}
