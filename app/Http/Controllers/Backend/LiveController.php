<?php

namespace App\Http\Controllers\Backend;

use App\Models\Live;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\LiveStoreRequest;
use App\Http\Requests\Backend\LiveUpdateRequest;

class LiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Live::class);

        $search = $request->get('search', '');

        $lives = Live::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.lives.index', compact('lives', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Live::class);

        $courses = Course::pluck('title', 'id');
        $teachers = Teacher::pluck('first_name', 'id');

        return view('backend.lives.create', compact('courses', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LiveStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Live::class);

        $validated = $request->validated();

        $live = Live::create($validated);

        return redirect()
            ->route('lives.edit', $live)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Live $live): View
    {
        $this->authorize('view', $live);

        return view('backend.lives.show', compact('live'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Live $live): View
    {
        $this->authorize('update', $live);

        $courses = Course::pluck('title', 'id');
        $teachers = Teacher::pluck('first_name', 'id');

        return view(
            'backend.lives.edit',
            compact('live', 'courses', 'teachers')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        LiveUpdateRequest $request,
        Live $live
    ): RedirectResponse {
        $this->authorize('update', $live);

        $validated = $request->validated();

        $live->update($validated);

        return redirect()
            ->route('lives.edit', $live)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Live $live): RedirectResponse
    {
        $this->authorize('delete', $live);

        $live->delete();

        return redirect()
            ->route('lives.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
