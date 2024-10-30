<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\TeacherCollection;
use App\Http\Requests\Backend\TeacherStoreRequest;
use App\Http\Requests\Backend\TeacherUpdateRequest;

class TeacherController extends Controller
{
    public function index(Request $request): TeacherCollection
    {
        $this->authorize('view-any', Teacher::class);

        $search = $request->get('search', '');

        $teachers = Teacher::search($search)
            ->latest()
            ->paginate();

        return new TeacherCollection($teachers);
    }

    public function store(TeacherStoreRequest $request): TeacherResource
    {
        $this->authorize('create', Teacher::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $teacher = Teacher::create($validated);

        return new TeacherResource($teacher);
    }

    public function show(Request $request, Teacher $teacher): TeacherResource
    {
        $this->authorize('view', $teacher);

        return new TeacherResource($teacher);
    }

    public function update(
        TeacherUpdateRequest $request,
        Teacher $teacher
    ): TeacherResource {
        $this->authorize('update', $teacher);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($teacher->image) {
                Storage::delete($teacher->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $teacher->update($validated);

        return new TeacherResource($teacher);
    }

    public function destroy(Request $request, Teacher $teacher): Response
    {
        $this->authorize('delete', $teacher);

        if ($teacher->image) {
            Storage::delete($teacher->image);
        }

        $teacher->delete();

        return response()->noContent();
    }
}
