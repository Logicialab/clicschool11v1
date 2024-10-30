<?php

namespace App\Http\Controllers\Api;

use App\Models\QuestionQuiz;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionQuizResource;
use App\Http\Resources\QuestionQuizCollection;
use App\Http\Requests\Backend\QuestionQuizStoreRequest;
use App\Http\Requests\Backend\QuestionQuizUpdateRequest;

class QuestionQuizController extends Controller
{
    public function index(Request $request): QuestionQuizCollection
    {
        $this->authorize('view-any', QuestionQuiz::class);

        $search = $request->get('search', '');

        $questionQuizs = QuestionQuiz::search($search)
            ->latest()
            ->paginate();

        return new QuestionQuizCollection($questionQuizs);
    }

    public function store(
        QuestionQuizStoreRequest $request
    ): QuestionQuizResource {
        $this->authorize('create', QuestionQuiz::class);

        $validated = $request->validated();

        $questionQuiz = QuestionQuiz::create($validated);

        return new QuestionQuizResource($questionQuiz);
    }

    public function show(
        Request $request,
        QuestionQuiz $questionQuiz
    ): QuestionQuizResource {
        $this->authorize('view', $questionQuiz);

        return new QuestionQuizResource($questionQuiz);
    }

    public function update(
        QuestionQuizUpdateRequest $request,
        QuestionQuiz $questionQuiz
    ): QuestionQuizResource {
        $this->authorize('update', $questionQuiz);

        $validated = $request->validated();

        $questionQuiz->update($validated);

        return new QuestionQuizResource($questionQuiz);
    }

    public function destroy(
        Request $request,
        QuestionQuiz $questionQuiz
    ): Response {
        $this->authorize('delete', $questionQuiz);

        $questionQuiz->delete();

        return response()->noContent();
    }
}
