<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherSalaryResource;
use App\Http\Resources\TeacherSalaryCollection;

class TeacherTeacherSalariesController extends Controller
{
    public function index(
        Request $request,
        Teacher $teacher
    ): TeacherSalaryCollection {
        $this->authorize('view', $teacher);

        $search = $request->get('search', '');

        $teacherSalaries = $teacher
            ->teacherSalaries()
            ->search($search)
            ->latest()
            ->paginate();

        return new TeacherSalaryCollection($teacherSalaries);
    }

    public function store(
        Request $request,
        Teacher $teacher
    ): TeacherSalaryResource {
        $this->authorize('create', TeacherSalary::class);

        $validated = $request->validate([
            'montly_salary' => ['required', 'numeric'],
            'paid_at' => ['required', 'date'],
            'status' => ['nullable', 'max:255', 'string'],
        ]);

        $teacherSalary = $teacher->teacherSalaries()->create($validated);

        return new TeacherSalaryResource($teacherSalary);
    }
}
