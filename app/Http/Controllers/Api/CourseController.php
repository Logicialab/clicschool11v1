<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CourseCollection;
use App\Http\Requests\Backend\CourseStoreRequest;
use App\Http\Requests\Backend\CourseUpdateRequest;

class CourseController extends Controller
{
    public function index(Request $request): CourseCollection
    {
        $this->authorize('view-any', Course::class);

        $search = $request->get('search', '');

        $courses = Course::search($search)
            ->latest()
            ->paginate();

        return new CourseCollection($courses);
    }

    public function store(CourseStoreRequest $request): CourseResource
    {
        $this->authorize('create', Course::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $course = Course::create($validated);

        return new CourseResource($course);
    }

    public function show(Request $request, Course $course): CourseResource
    {
        $this->authorize('view', $course);

        return new CourseResource($course);
    }

    public function update(
        CourseUpdateRequest $request,
        Course $course
    ): CourseResource {
        $this->authorize('update', $course);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::delete($course->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $course->update($validated);

        return new CourseResource($course);
    }

    public function destroy(Request $request, Course $course): Response
    {
        $this->authorize('delete', $course);

        if ($course->image) {
            Storage::delete($course->image);
        }

        $course->delete();

        return response()->noContent();
    }
}
