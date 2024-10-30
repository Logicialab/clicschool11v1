<?php

namespace App\Http\Livewire;

use App\Models\File;
use App\Models\Course;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseFilesDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Course $course;
    public File $file;
    public $fileFile;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New File';

    protected $rules = [
        'file.title' => ['required', 'max:255', 'string'],
        'file.description' => ['nullable', 'max:255', 'string'],
        'file.active' => ['required', 'boolean'],
        'fileFile' => ['file', 'max:1024', 'nullable'],
    ];

    public function mount(Course $course): void
    {
        $this->course = $course;
        $this->resetFileData();
    }

    public function resetFileData(): void
    {
        $this->file = new File();

        $this->fileFile = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newFile(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.course_files.new_title');
        $this->resetFileData();

        $this->showModal();
    }

    public function editFile(File $file): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.course_files.edit_title');
        $this->file = $file;

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

        if (!$this->file->course_id) {
            $this->authorize('create', File::class);

            $this->file->course_id = $this->course->id;
        } else {
            $this->authorize('update', $this->file);
        }

        if ($this->fileFile) {
            $this->file->file = $this->fileFile->store('public');
        }

        $this->file->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', File::class);

        collect($this->selected)->each(function (string $id) {
            $file = File::findOrFail($id);

            if ($file->file) {
                Storage::delete($file->file);
            }

            $file->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetFileData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->course->files as $file) {
            array_push($this->selected, $file->id);
        }
    }

    public function render(): View
    {
        return view('livewire.course-files-detail', [
            'files' => $this->course->files()->paginate(20),
        ]);
    }
}
