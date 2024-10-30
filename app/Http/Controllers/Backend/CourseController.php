<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\CourseStoreRequest;
use App\Http\Requests\Backend\CourseUpdateRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Course::class);

        $search = $request->get('search', '');

        $courses = Course::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.courses.index', compact('courses', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Course::class);

        $subjects = Subject::pluck('name', 'id');
        $teachers = Teacher::pluck('first_name', 'id');

        return view('backend.courses.create', compact('subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Course::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $course = Course::create($validated);

        return redirect()
            ->route('courses.edit', $course)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Course $course): View
    {
        $this->authorize('view', $course);

        return view('backend.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Course $course): View
    {
        $this->authorize('update', $course);

        $subjects = Subject::pluck('name', 'id');
        $teachers = Teacher::pluck('first_name', 'id');

        return view(
            'backend.courses.edit',
            compact('course', 'subjects', 'teachers')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CourseUpdateRequest $request,
        Course $course
    ): RedirectResponse {
        $this->authorize('update', $course);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::delete($course->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $course->update($validated);

        return redirect()
            ->route('courses.edit', $course)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Course $course): RedirectResponse
    {
        $this->authorize('delete', $course);

        if ($course->image) {
            Storage::delete($course->image);
        }

        $course->delete();

        return redirect()
            ->route('courses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
