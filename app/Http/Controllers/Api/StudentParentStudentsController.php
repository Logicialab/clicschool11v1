<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParentStudentResource;
use App\Http\Resources\ParentStudentCollection;

class StudentParentStudentsController extends Controller
{
    public function index(
        Request $request,
        Student $student
    ): ParentStudentCollection {
        $this->authorize('view', $student);

        $search = $request->get('search', '');

        $parentStudents = $student
            ->parentStudents()
            ->search($search)
            ->latest()
            ->paginate();

        return new ParentStudentCollection($parentStudents);
    }

    public function store(
        Request $request,
        Student $student
    ): ParentStudentResource {
        $this->authorize('create', ParentStudent::class);

        $validated = $request->validate([
            'parente_id' => ['required', 'exists:parentes,id'],
        ]);

        $parentStudent = $student->parentStudents()->create($validated);

        return new ParentStudentResource($parentStudent);
    }
}
