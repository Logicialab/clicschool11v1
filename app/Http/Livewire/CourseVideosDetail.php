<?php

namespace App\Http\Livewire;

use App\Models\Video;
use App\Models\Course;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseVideosDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Course $course;
    public Video $video;
    public $videoImage;
    public $videoFile;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Video';

    protected $rules = [
        'video.title' => ['required', 'max:255', 'string'],
        'video.url' => ['required', 'url'],
        'video.description' => ['nullable', 'max:255', 'string'],
        'videoImage' => ['nullable', 'image', 'max:1024'],
        'video.active' => ['required', 'boolean'],
        'videoFile' => ['file', 'max:1024', 'nullable'],
        'video.slug' => ['nullable', 'unique:videos,slug', 'max:255', 'string'],
    ];

    public function mount(Course $course): void
    {
        $this->course = $course;
        $this->resetVideoData();
    }

    public function resetVideoData(): void
    {
        $this->video = new Video();

        $this->videoImage = null;
        $this->videoFile = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newVideo(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.course_videos.new_title');
        $this->resetVideoData();

        $this->showModal();
    }

    public function editVideo(Video $video): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.course_videos.edit_title');
        $this->video = $video;

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
        if (!$this->video->course_id) {
            $this->validate();
        } else {
            $this->validate([
                'video.title' => ['required', 'max:255', 'string'],
                'video.url' => ['required', 'url'],
                'video.description' => ['nullable', 'max:255', 'string'],
                'videoImage' => ['nullable', 'image', 'max:1024'],
                'video.active' => ['required', 'boolean'],
                'videoFile' => ['file', 'max:1024', 'nullable'],
                'video.slug' => [
                    'nullable',
                    Rule::unique('videos', 'slug')->ignore($this->video),
                    'max:255',
                    'string',
                ],
            ]);
        }

        if (!$this->video->course_id) {
            $this->authorize('create', Video::class);

            $this->video->course_id = $this->course->id;
        } else {
            $this->authorize('update', $this->video);
        }

        if ($this->videoImage) {
            $this->video->image = $this->videoImage->store('public');
        }

        if ($this->videoFile) {
            $this->video->file = $this->videoFile->store('public');
        }

        $this->video->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Video::class);

        collect($this->selected)->each(function (string $id) {
            $video = Video::findOrFail($id);

            if ($video->image) {
                Storage::delete($video->image);
            }

            if ($video->file) {
                Storage::delete($video->file);
            }

            $video->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetVideoData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->course->videos as $video) {
            array_push($this->selected, $video->id);
        }
    }

    public function render(): View
    {
        return view('livewire.course-videos-detail', [
            'videos' => $this->course->videos()->paginate(20),
        ]);
    }
}
