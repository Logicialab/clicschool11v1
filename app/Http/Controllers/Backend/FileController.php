<?php

namespace App\Http\Controllers\Backend;

use App\Models\File;
use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\FileStoreRequest;
use App\Http\Requests\Backend\FileUpdateRequest;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', File::class);

        $search = $request->get('search', '');

        $files = File::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.files.index', compact('files', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', File::class);

        $courses = Course::pluck('title', 'id');

        return view('backend.files.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FileStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', File::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $file = File::create($validated);

        return redirect()
            ->route('files.edit', $file)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, File $file): View
    {
        $this->authorize('view', $file);

        return view('backend.files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, File $file): View
    {
        $this->authorize('update', $file);

        $courses = Course::pluck('title', 'id');

        return view('backend.files.edit', compact('file', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FileUpdateRequest $request,
        File $file
    ): RedirectResponse {
        $this->authorize('update', $file);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            if ($file->file) {
                Storage::delete($file->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $file->update($validated);

        return redirect()
            ->route('files.edit', $file)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, File $file): RedirectResponse
    {
        $this->authorize('delete', $file);

        if ($file->file) {
            Storage::delete($file->file);
        }

        $file->delete();

        return redirect()
            ->route('files.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
