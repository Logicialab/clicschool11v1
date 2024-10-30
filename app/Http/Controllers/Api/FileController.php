<?php

namespace App\Http\Controllers\Api;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\FileResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\FileCollection;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\FileStoreRequest;
use App\Http\Requests\Backend\FileUpdateRequest;

class FileController extends Controller
{
    public function index(Request $request): FileCollection
    {
        $this->authorize('view-any', File::class);

        $search = $request->get('search', '');

        $files = File::search($search)
            ->latest()
            ->paginate();

        return new FileCollection($files);
    }

    public function store(FileStoreRequest $request): FileResource
    {
        $this->authorize('create', File::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $file = File::create($validated);

        return new FileResource($file);
    }

    public function show(Request $request, File $file): FileResource
    {
        $this->authorize('view', $file);

        return new FileResource($file);
    }

    public function update(FileUpdateRequest $request, File $file): FileResource
    {
        $this->authorize('update', $file);

        $validated = $request->validated();

        if ($request->hasFile('file')) {
            if ($file->file) {
                Storage::delete($file->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $file->update($validated);

        return new FileResource($file);
    }

    public function destroy(Request $request, File $file): Response
    {
        $this->authorize('delete', $file);

        if ($file->file) {
            Storage::delete($file->file);
        }

        $file->delete();

        return response()->noContent();
    }
}
