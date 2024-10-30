<?php

namespace App\Http\Controllers\Backend;

use App\Models\Classe;
use App\Models\Subject;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\SubjectStoreRequest;
use App\Http\Requests\Backend\SubjectUpdateRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Subject::class);

        $search = $request->get('search', '');

        $subjects = Subject::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.subjects.index', compact('subjects', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Subject::class);

        $classes = Classe::pluck('name', 'id');

        return view('backend.subjects.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Subject::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $subject = Subject::create($validated);

        return redirect()
            ->route('subjects.edit', $subject)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Subject $subject): View
    {
        $this->authorize('view', $subject);

        return view('backend.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Subject $subject): View
    {
        $this->authorize('update', $subject);

        $classes = Classe::pluck('name', 'id');

        return view('backend.subjects.edit', compact('subject', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SubjectUpdateRequest $request,
        Subject $subject
    ): RedirectResponse {
        $this->authorize('update', $subject);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($subject->image) {
                Storage::delete($subject->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $subject->update($validated);

        return redirect()
            ->route('subjects.edit', $subject)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Subject $subject
    ): RedirectResponse {
        $this->authorize('delete', $subject);

        if ($subject->image) {
            Storage::delete($subject->image);
        }

        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
