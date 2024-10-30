<?php

namespace App\Http\Controllers\Api;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Http\Resources\StudentCollection;

class ClasseStudentsController extends Controller
{
    public function index(Request $request, Classe $classe): StudentCollection
    {
        $this->authorize('view', $classe);

        $search = $request->get('search', '');

        $students = $classe
            ->students()
            ->search($search)
            ->latest()
            ->paginate();

        return new StudentCollection($students);
    }

    public function store(Request $request, Classe $classe): StudentResource
    {
        $this->authorize('create', Student::class);

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'first_name' => ['required', 'max:255', 'string'],
            'last_name' => ['required', 'max:255', 'string'],
            'nickname' => ['nullable', 'max:255', 'string'],
            'slug' => ['nullable', 'unique:students,slug', 'max:255', 'string'],
            'home_adress' => ['nullable', 'max:255', 'string'],
            'street' => ['nullable', 'max:255', 'string'],
            'neighborhood' => ['nullable', 'max:255', 'string'],
            'city' => ['nullable', 'max:255', 'string'],
            'school_name' => ['nullable', 'max:255', 'string'],
            'student_level' => ['nullable', 'max:255', 'string'],
            'name_guardian' => ['nullable', 'max:255', 'string'],
            'Profession' => ['nullable', 'max:255', 'string'],
            'etablissement_travail' => ['nullable', 'max:255', 'string'],
        ]);

        $student = $classe->students()->create($validated);

        return new StudentResource($student);
    }
}
