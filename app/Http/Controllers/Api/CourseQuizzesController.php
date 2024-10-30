<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Resources\QuizResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuizCollection;

class CourseQuizzesController extends Controller
{
    public function index(Request $request, Course $course): QuizCollection
    {
        $this->authorize('view', $course);

        $search = $request->get('search', '');

        $quizzes = $course
            ->quizzes()
            ->search($search)
            ->latest()
            ->paginate();

        return new QuizCollection($quizzes);
    }

    public function store(Request $request, Course $course): QuizResource
    {
        $this->authorize('create', Quiz::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'active' => ['required', 'boolean'],
            'order' => ['nullable', 'numeric'],
            'slug' => ['nullable', 'unique:quizzes,slug', 'max:255', 'string'],
        ]);

        $quiz = $course->quizzes()->create($validated);

        return new QuizResource($quiz);
    }
}
