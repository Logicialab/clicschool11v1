<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Http\Resources\TeacherCollection;

class UserTeachersController extends Controller
{
    public function index(Request $request, User $user): TeacherCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $teachers = $user
            ->teachers()
            ->search($search)
            ->latest()
            ->paginate();

        return new TeacherCollection($teachers);
    }

    public function store(Request $request, User $user): TeacherResource
    {
        $this->authorize('create', Teacher::class);

        $validated = $request->validate([
            'first_name' => ['required', 'max:255', 'string'],
            'last_name' => ['required', 'max:255', 'string'],
            'bio' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'salaire' => ['nullable', 'numeric'],
            'slug' => ['nullable', 'unique:teachers,slug', 'max:255', 'string'],
            'school_name' => ['nullable', 'max:255', 'string'],
            'specialite' => ['nullable', 'max:255', 'string'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $teacher = $user->teachers()->create($validated);

        return new TeacherResource($teacher);
    }
}
