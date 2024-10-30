<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciceResource;
use App\Http\Resources\ExerciceCollection;

class CourseExercicesController extends Controller
{
    public function index(Request $request, Course $course): ExerciceCollection
    {
        $this->authorize('view', $course);

        $search = $request->get('search', '');

        $exercices = $course
            ->exercices()
            ->search($search)
            ->latest()
            ->paginate();

        return new ExerciceCollection($exercices);
    }

    public function store(Request $request, Course $course): ExerciceResource
    {
        $this->authorize('create', Exercice::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'slug' => [
                'nullable',
                'unique:exercices,slug',
                'max:255',
                'string',
            ],
            'order' => ['nullable', 'numeric'],
            'active' => ['required', 'boolean'],
            'file' => ['file', 'max:1024', 'nullable'],
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $exercice = $course->exercices()->create($validated);

        return new ExerciceResource($exercice);
    }
}
