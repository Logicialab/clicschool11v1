<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Resources\LiveResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\LiveCollection;

class TeacherLivesController extends Controller
{
    public function index(Request $request, Teacher $teacher): LiveCollection
    {
        $this->authorize('view', $teacher);

        $search = $request->get('search', '');

        $lives = $teacher
            ->lives()
            ->search($search)
            ->latest()
            ->paginate();

        return new LiveCollection($lives);
    }

    public function store(Request $request, Teacher $teacher): LiveResource
    {
        $this->authorize('create', Live::class);

        $validated = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'url' => ['required', 'url'],
            'scheduled_at' => ['required', 'date'],
            'duration' => ['nullable', 'numeric'],
            'active' => ['required', 'boolean'],
        ]);

        $live = $teacher->lives()->create($validated);

        return new LiveResource($live);
    }
}
