<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Http\Resources\VideoCollection;

class CourseVideosController extends Controller
{
    public function index(Request $request, Course $course): VideoCollection
    {
        $this->authorize('view', $course);

        $search = $request->get('search', '');

        $videos = $course
            ->videos()
            ->search($search)
            ->latest()
            ->paginate();

        return new VideoCollection($videos);
    }

    public function store(Request $request, Course $course): VideoResource
    {
        $this->authorize('create', Video::class);

        $validated = $request->validate([
            'url' => ['required', 'url'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'file' => ['file', 'max:1024', 'nullable'],
            'active' => ['required', 'boolean'],
            'slug' => ['nullable', 'unique:videos,slug', 'max:255', 'string'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $video = $course->videos()->create($validated);

        return new VideoResource($video);
    }
}
