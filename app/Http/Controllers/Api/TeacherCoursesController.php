<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseCollection;

class TeacherCoursesController extends Controller
{
    public function index(Request $request, Teacher $teacher): CourseCollection
    {
        $this->authorize('view', $teacher);

        $search = $request->get('search', '');

        $courses = $teacher
            ->courses()
            ->search($search)
            ->latest()
            ->paginate();

        return new CourseCollection($courses);
    }

    public function store(Request $request, Teacher $teacher): CourseResource
    {
        $this->authorize('create', Course::class);

        $validated = $request->validate([
            'subject_id' => ['required', 'exists:subjects,id'],
            'title' => ['required', 'max:255', 'string'],
            'slug' => ['nullable', 'unique:courses,slug', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'body' => ['required', 'max:255', 'string'],
            'order' => ['nullable', 'numeric'],
            'active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $course = $teacher->courses()->create($validated);

        return new CourseResource($course);
    }
}
