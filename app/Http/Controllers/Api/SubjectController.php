<?php

namespace App\Http\Controllers\Api;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SubjectCollection;
use App\Http\Requests\Backend\SubjectStoreRequest;
use App\Http\Requests\Backend\SubjectUpdateRequest;

class SubjectController extends Controller
{
    public function index(Request $request): SubjectCollection
    {
        $this->authorize('view-any', Subject::class);

        $search = $request->get('search', '');

        $subjects = Subject::search($search)
            ->latest()
            ->paginate();

        return new SubjectCollection($subjects);
    }

    public function store(SubjectStoreRequest $request): SubjectResource
    {
        $this->authorize('create', Subject::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $subject = Subject::create($validated);

        return new SubjectResource($subject);
    }

    public function show(Request $request, Subject $subject): SubjectResource
    {
        $this->authorize('view', $subject);

        return new SubjectResource($subject);
    }

    public function update(
        SubjectUpdateRequest $request,
        Subject $subject
    ): SubjectResource {
        $this->authorize('update', $subject);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($subject->image) {
                Storage::delete($subject->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $subject->update($validated);

        return new SubjectResource($subject);
    }

    public function destroy(Request $request, Subject $subject): Response
    {
        $this->authorize('delete', $subject);

        if ($subject->image) {
            Storage::delete($subject->image);
        }

        $subject->delete();

        return response()->noContent();
    }
}
