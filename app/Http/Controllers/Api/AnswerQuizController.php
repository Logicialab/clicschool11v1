<?php

namespace App\Http\Controllers\Api;

use App\Models\AnswerQuiz;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnswerQuizResource;
use App\Http\Resources\AnswerQuizCollection;
use App\Http\Requests\Backend\AnswerQuizStoreRequest;
use App\Http\Requests\Backend\AnswerQuizUpdateRequest;

class AnswerQuizController extends Controller
{
    public function index(Request $request): AnswerQuizCollection
    {
        $this->authorize('view-any', AnswerQuiz::class);

        $search = $request->get('search', '');

        $answerQuizs = AnswerQuiz::search($search)
            ->latest()
            ->paginate();

        return new AnswerQuizCollection($answerQuizs);
    }

    public function store(AnswerQuizStoreRequest $request): AnswerQuizResource
    {
        $this->authorize('create', AnswerQuiz::class);

        $validated = $request->validated();

        $answerQuiz = AnswerQuiz::create($validated);

        return new AnswerQuizResource($answerQuiz);
    }

    public function show(
        Request $request,
        AnswerQuiz $answerQuiz
    ): AnswerQuizResource {
        $this->authorize('view', $answerQuiz);

        return new AnswerQuizResource($answerQuiz);
    }

    public function update(
        AnswerQuizUpdateRequest $request,
        AnswerQuiz $answerQuiz
    ): AnswerQuizResource {
        $this->authorize('update', $answerQuiz);

        $validated = $request->validated();

        $answerQuiz->update($validated);

        return new AnswerQuizResource($answerQuiz);
    }

    public function destroy(Request $request, AnswerQuiz $answerQuiz): Response
    {
        $this->authorize('delete', $answerQuiz);

        $answerQuiz->delete();

        return response()->noContent();
    }
}
