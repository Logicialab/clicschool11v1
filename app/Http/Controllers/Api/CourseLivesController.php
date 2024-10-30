<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Resources\LiveResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\LiveCollection;

class CourseLivesController extends Controller
{
    public function index(Request $request, Course $course): LiveCollection
    {
        $this->authorize('view', $course);

        $search = $request->get('search', '');

        $lives = $course
            ->lives()
            ->search($search)
            ->latest()
            ->paginate();

        return new LiveCollection($lives);
    }

    public function store(Request $request, Course $course): LiveResource
    {
        $this->authorize('create', Live::class);

        $validated = $request->validate([
            'teacher_id' => ['required', 'exists:teachers,id'],
            'url' => ['required', 'url'],
            'scheduled_at' => ['required', 'date'],
            'duration' => ['nullable', 'numeric'],
            'active' => ['required', 'boolean'],
        ]);

        $live = $course->lives()->create($validated);

        return new LiveResource($live);
    }
}
