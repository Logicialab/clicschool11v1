<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Resources\FileResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\FileCollection;

class CourseFilesController extends Controller
{
    public function index(Request $request, Course $course): FileCollection
    {
        $this->authorize('view', $course);

        $search = $request->get('search', '');

        $files = $course
            ->files()
            ->search($search)
            ->latest()
            ->paginate();

        return new FileCollection($files);
    }

    public function store(Request $request, Course $course): FileResource
    {
        $this->authorize('create', File::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'file' => ['file', 'max:1024', 'nullable'],
            'active' => ['required', 'boolean'],
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $file = $course->files()->create($validated);

        return new FileResource($file);
    }
}
