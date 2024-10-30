<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TeacherSalary;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherSalaryResource;
use App\Http\Resources\TeacherSalaryCollection;
use App\Http\Requests\Backend\TeacherSalaryStoreRequest;
use App\Http\Requests\Backend\TeacherSalaryUpdateRequest;

class TeacherSalaryController extends Controller
{
    public function index(Request $request): TeacherSalaryCollection
    {
        $this->authorize('view-any', TeacherSalary::class);

        $search = $request->get('search', '');

        $teacherSalaries = TeacherSalary::search($search)
            ->latest()
            ->paginate();

        return new TeacherSalaryCollection($teacherSalaries);
    }

    public function store(
        TeacherSalaryStoreRequest $request
    ): TeacherSalaryResource {
        $this->authorize('create', TeacherSalary::class);

        $validated = $request->validated();

        $teacherSalary = TeacherSalary::create($validated);

        return new TeacherSalaryResource($teacherSalary);
    }

    public function show(
        Request $request,
        TeacherSalary $teacherSalary
    ): TeacherSalaryResource {
        $this->authorize('view', $teacherSalary);

        return new TeacherSalaryResource($teacherSalary);
    }

    public function update(
        TeacherSalaryUpdateRequest $request,
        TeacherSalary $teacherSalary
    ): TeacherSalaryResource {
        $this->authorize('update', $teacherSalary);

        $validated = $request->validated();

        $teacherSalary->update($validated);

        return new TeacherSalaryResource($teacherSalary);
    }

    public function destroy(
        Request $request,
        TeacherSalary $teacherSalary
    ): Response {
        $this->authorize('delete', $teacherSalary);

        $teacherSalary->delete();

        return response()->noContent();
    }
}
