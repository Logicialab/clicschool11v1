<?php

namespace App\Http\Livewire;

use App\Models\Live;
use App\Models\Course;
use Livewire\Component;
use App\Models\Teacher;
use Illuminate\View\View;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TeacherLivesDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Teacher $teacher;
    public Live $live;
    public $coursesForSelect = [];
    public $liveScheduledAt;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Live';

    protected $rules = [
        'live.course_id' => ['required', 'exists:courses,id'],
        'live.url' => ['required', 'url'],
        'liveScheduledAt' => ['required', 'date'],
        'live.duration' => ['nullable', 'numeric'],
        'live.active' => ['required', 'boolean'],
    ];

    public function mount(Teacher $teacher): void
    {
        $this->teacher = $teacher;
        $this->coursesForSelect = Course::pluck('title', 'id');
        $this->resetLiveData();
    }

    public function resetLiveData(): void
    {
        $this->live = new Live();

        $this->liveScheduledAt = null;
        $this->live->course_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newLive(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.teacher_lives.new_title');
        $this->resetLiveData();

        $this->showModal();
    }

    public function editLive(Live $live): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.teacher_lives.edit_title');
        $this->live = $live;

        $this->liveScheduledAt = optional($this->live->scheduled_at)->format(
            'Y-m-d'
        );

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

        if (!$this->live->teacher_id) {
            $this->authorize('create', Live::class);

            $this->live->teacher_id = $this->teacher->id;
        } else {
            $this->authorize('update', $this->live);
        }

        $this->live->scheduled_at = \Carbon\Carbon::make(
            $this->liveScheduledAt
        );

        $this->live->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Live::class);

        Live::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetLiveData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->teacher->lives as $live) {
            array_push($this->selected, $live->id);
        }
    }

    public function render(): View
    {
        return view('livewire.teacher-lives-detail', [
            'lives' => $this->teacher->lives()->paginate(20),
        ]);
    }
}
