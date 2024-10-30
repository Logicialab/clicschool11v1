<?php

namespace App\Http\Controllers\Backend;

use App\Models\Video;
use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\VideoStoreRequest;
use App\Http\Requests\Backend\VideoUpdateRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Video::class);

        $search = $request->get('search', '');

        $videos = Video::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.videos.index', compact('videos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Video::class);

        $courses = Course::pluck('title', 'id');

        return view('backend.videos.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Video::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $video = Video::create($validated);

        return redirect()
            ->route('videos.edit', $video)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Video $video): View
    {
        $this->authorize('view', $video);

        return view('backend.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Video $video): View
    {
        $this->authorize('update', $video);

        $courses = Course::pluck('title', 'id');

        return view('backend.videos.edit', compact('video', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        VideoUpdateRequest $request,
        Video $video
    ): RedirectResponse {
        $this->authorize('update', $video);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($video->image) {
                Storage::delete($video->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        if ($request->hasFile('file')) {
            if ($video->file) {
                Storage::delete($video->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $video->update($validated);

        return redirect()
            ->route('videos.edit', $video)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Video $video): RedirectResponse
    {
        $this->authorize('delete', $video);

        if ($video->image) {
            Storage::delete($video->image);
        }

        if ($video->file) {
            Storage::delete($video->file);
        }

        $video->delete();

        return redirect()
            ->route('videos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
