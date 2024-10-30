<?php

namespace App\Http\Controllers\Api;

use App\Models\Parente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParentStudentResource;
use App\Http\Resources\ParentStudentCollection;

class ParenteParentStudentsController extends Controller
{
    public function index(
        Request $request,
        Parente $parente
    ): ParentStudentCollection {
        $this->authorize('view', $parente);

        $search = $request->get('search', '');

        $parentStudents = $parente
            ->parentStudents()
            ->search($search)
            ->latest()
            ->paginate();

        return new ParentStudentCollection($parentStudents);
    }

    public function store(
        Request $request,
        Parente $parente
    ): ParentStudentResource {
        $this->authorize('create', ParentStudent::class);

        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
        ]);

        $parentStudent = $parente->parentStudents()->create($validated);

        return new ParentStudentResource($parentStudent);
    }
}
