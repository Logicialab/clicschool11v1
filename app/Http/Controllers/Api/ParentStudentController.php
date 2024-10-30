<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ParentStudent;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParentStudentResource;
use App\Http\Resources\ParentStudentCollection;
use App\Http\Requests\Backend\ParentStudentStoreRequest;
use App\Http\Requests\Backend\ParentStudentUpdateRequest;

class ParentStudentController extends Controller
{
    public function index(Request $request): ParentStudentCollection
    {
        $this->authorize('view-any', ParentStudent::class);

        $search = $request->get('search', '');

        $parentStudents = ParentStudent::search($search)
            ->latest()
            ->paginate();

        return new ParentStudentCollection($parentStudents);
    }

    public function store(
        ParentStudentStoreRequest $request
    ): ParentStudentResource {
        $this->authorize('create', ParentStudent::class);

        $validated = $request->validated();

        $parentStudent = ParentStudent::create($validated);

        return new ParentStudentResource($parentStudent);
    }

    public function show(
        Request $request,
        ParentStudent $parentStudent
    ): ParentStudentResource {
        $this->authorize('view', $parentStudent);

        return new ParentStudentResource($parentStudent);
    }

    public function update(
        ParentStudentUpdateRequest $request,
        ParentStudent $parentStudent
    ): ParentStudentResource {
        $this->authorize('update', $parentStudent);

        $validated = $request->validated();

        $parentStudent->update($validated);

        return new ParentStudentResource($parentStudent);
    }

    public function destroy(
        Request $request,
        ParentStudent $parentStudent
    ): Response {
        $this->authorize('delete', $parentStudent);

        $parentStudent->delete();

        return response()->noContent();
    }
}
