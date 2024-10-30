<?php

namespace App\Http\Controllers\Api;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PartnerCollection;
use App\Http\Requests\Backend\PartnerStoreRequest;
use App\Http\Requests\Backend\PartnerUpdateRequest;

class PartnerController extends Controller
{
    public function index(Request $request): PartnerCollection
    {
        $this->authorize('view-any', Partner::class);

        $search = $request->get('search', '');

        $partners = Partner::search($search)
            ->latest()
            ->paginate();

        return new PartnerCollection($partners);
    }

    public function store(PartnerStoreRequest $request): PartnerResource
    {
        $this->authorize('create', Partner::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $partner = Partner::create($validated);

        return new PartnerResource($partner);
    }

    public function show(Request $request, Partner $partner): PartnerResource
    {
        $this->authorize('view', $partner);

        return new PartnerResource($partner);
    }

    public function update(
        PartnerUpdateRequest $request,
        Partner $partner
    ): PartnerResource {
        $this->authorize('update', $partner);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($partner->image) {
                Storage::delete($partner->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $partner->update($validated);

        return new PartnerResource($partner);
    }

    public function destroy(Request $request, Partner $partner): Response
    {
        $this->authorize('delete', $partner);

        if ($partner->image) {
            Storage::delete($partner->image);
        }

        $partner->delete();

        return response()->noContent();
    }
}
