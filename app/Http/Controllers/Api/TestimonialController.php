<?php

namespace App\Http\Controllers\Api;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\TestimonialResource;
use App\Http\Resources\TestimonialCollection;
use App\Http\Requests\Backend\TestimonialStoreRequest;
use App\Http\Requests\Backend\TestimonialUpdateRequest;

class TestimonialController extends Controller
{
    public function index(Request $request): TestimonialCollection
    {
        $this->authorize('view-any', Testimonial::class);

        $search = $request->get('search', '');

        $testimonials = Testimonial::search($search)
            ->latest()
            ->paginate();

        return new TestimonialCollection($testimonials);
    }

    public function store(TestimonialStoreRequest $request): TestimonialResource
    {
        $this->authorize('create', Testimonial::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $testimonial = Testimonial::create($validated);

        return new TestimonialResource($testimonial);
    }

    public function show(
        Request $request,
        Testimonial $testimonial
    ): TestimonialResource {
        $this->authorize('view', $testimonial);

        return new TestimonialResource($testimonial);
    }

    public function update(
        TestimonialUpdateRequest $request,
        Testimonial $testimonial
    ): TestimonialResource {
        $this->authorize('update', $testimonial);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::delete($testimonial->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $testimonial->update($validated);

        return new TestimonialResource($testimonial);
    }

    public function destroy(
        Request $request,
        Testimonial $testimonial
    ): Response {
        $this->authorize('delete', $testimonial);

        if ($testimonial->image) {
            Storage::delete($testimonial->image);
        }

        $testimonial->delete();

        return response()->noContent();
    }
}
