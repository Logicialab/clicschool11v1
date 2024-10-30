<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\TestimonialStoreRequest;
use App\Http\Requests\Backend\TestimonialUpdateRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Testimonial::class);

        $search = $request->get('search', '');

        $testimonials = Testimonial::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.testimonials.index',
            compact('testimonials', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Testimonial::class);

        return view('backend.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Testimonial::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $testimonial = Testimonial::create($validated);

        return redirect()
            ->route('testimonials.edit', $testimonial)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Testimonial $testimonial): View
    {
        $this->authorize('view', $testimonial);

        return view('backend.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Testimonial $testimonial): View
    {
        $this->authorize('update', $testimonial);

        return view('backend.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TestimonialUpdateRequest $request,
        Testimonial $testimonial
    ): RedirectResponse {
        $this->authorize('update', $testimonial);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::delete($testimonial->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $testimonial->update($validated);

        return redirect()
            ->route('testimonials.edit', $testimonial)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Testimonial $testimonial
    ): RedirectResponse {
        $this->authorize('delete', $testimonial);

        if ($testimonial->image) {
            Storage::delete($testimonial->image);
        }

        $testimonial->delete();

        return redirect()
            ->route('testimonials.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
