<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\StudentAnswerQuiz;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentAnswerQuizResource;
use App\Http\Resources\StudentAnswerQuizCollection;
use App\Http\Requests\Backend\StudentAnswerQuizStoreRequest;
use App\Http\Requests\Backend\StudentAnswerQuizUpdateRequest;

class StudentAnswerQuizController extends Controller
{
    public function index(Request $request): StudentAnswerQuizCollection
    {
        $this->authorize('view-any', StudentAnswerQuiz::class);

        $search = $request->get('search', '');

        $studentAnswerQuizs = StudentAnswerQuiz::search($search)
            ->latest()
            ->paginate();

        return new StudentAnswerQuizCollection($studentAnswerQuizs);
    }

    public function store(
        StudentAnswerQuizStoreRequest $request
    ): StudentAnswerQuizResource {
        $this->authorize('create', StudentAnswerQuiz::class);

        $validated = $request->validated();

        $studentAnswerQuiz = StudentAnswerQuiz::create($validated);

        return new StudentAnswerQuizResource($studentAnswerQuiz);
    }

    public function show(
        Request $request,
        StudentAnswerQuiz $studentAnswerQuiz
    ): StudentAnswerQuizResource {
        $this->authorize('view', $studentAnswerQuiz);

        return new StudentAnswerQuizResource($studentAnswerQuiz);
    }

    public function update(
        StudentAnswerQuizUpdateRequest $request,
        StudentAnswerQuiz $studentAnswerQuiz
    ): StudentAnswerQuizResource {
        $this->authorize('update', $studentAnswerQuiz);

        $validated = $request->validated();

        $studentAnswerQuiz->update($validated);

        return new StudentAnswerQuizResource($studentAnswerQuiz);
    }

    public function destroy(
        Request $request,
        StudentAnswerQuiz $studentAnswerQuiz
    ): Response {
        $this->authorize('delete', $studentAnswerQuiz);

        $studentAnswerQuiz->delete();

        return response()->noContent();
    }
}
