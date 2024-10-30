<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\QuizResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuizCollection;
use App\Http\Requests\Backend\QuizStoreRequest;
use App\Http\Requests\Backend\QuizUpdateRequest;

class QuizController extends Controller
{
    public function index(Request $request): QuizCollection
    {
        $this->authorize('view-any', Quiz::class);

        $search = $request->get('search', '');

        $quizzes = Quiz::search($search)
            ->latest()
            ->paginate();

        return new QuizCollection($quizzes);
    }

    public function store(QuizStoreRequest $request): QuizResource
    {
        $this->authorize('create', Quiz::class);

        $validated = $request->validated();

        $quiz = Quiz::create($validated);

        return new QuizResource($quiz);
    }

    public function show(Request $request, Quiz $quiz): QuizResource
    {
        $this->authorize('view', $quiz);

        return new QuizResource($quiz);
    }

    public function update(QuizUpdateRequest $request, Quiz $quiz): QuizResource
    {
        $this->authorize('update', $quiz);

        $validated = $request->validated();

        $quiz->update($validated);

        return new QuizResource($quiz);
    }

    public function destroy(Request $request, Quiz $quiz): Response
    {
        $this->authorize('delete', $quiz);

        $quiz->delete();

        return response()->noContent();
    }
}
