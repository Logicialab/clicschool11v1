<?php

namespace App\Http\Controllers\Api;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseCollection;

class SubjectCoursesController extends Controller
{
    public function index(Request $request, Subject $subject): CourseCollection
    {
        $this->authorize('view', $subject);

        $search = $request->get('search', '');

        $courses = $subject
            ->courses()
            ->search($search)
            ->latest()
            ->paginate();

        return new CourseCollection($courses);
    }

    public function store(Request $request, Subject $subject): CourseResource
    {
        $this->authorize('create', Course::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'slug' => ['nullable', 'unique:courses,slug', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'body' => ['required', 'max:255', 'string'],
            'order' => ['nullable', 'numeric'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $course = $subject->courses()->create($validated);

        return new CourseResource($course);
    }
}
