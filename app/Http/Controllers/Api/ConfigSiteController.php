<?php

namespace App\Http\Controllers\Api;

use App\Models\ConfigSite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ConfigSiteResource;
use App\Http\Resources\ConfigSiteCollection;
use App\Http\Requests\Backend\ConfigSiteStoreRequest;
use App\Http\Requests\Backend\ConfigSiteUpdateRequest;

class ConfigSiteController extends Controller
{
    public function index(Request $request): ConfigSiteCollection
    {
        $this->authorize('view-any', ConfigSite::class);

        $search = $request->get('search', '');

        $configSites = ConfigSite::search($search)
            ->latest()
            ->paginate();

        return new ConfigSiteCollection($configSites);
    }

    public function store(ConfigSiteStoreRequest $request): ConfigSiteResource
    {
        $this->authorize('create', ConfigSite::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $configSite = ConfigSite::create($validated);

        return new ConfigSiteResource($configSite);
    }

    public function show(
        Request $request,
        ConfigSite $configSite
    ): ConfigSiteResource {
        $this->authorize('view', $configSite);

        return new ConfigSiteResource($configSite);
    }

    public function update(
        ConfigSiteUpdateRequest $request,
        ConfigSite $configSite
    ): ConfigSiteResource {
        $this->authorize('update', $configSite);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($configSite->image) {
                Storage::delete($configSite->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $configSite->update($validated);

        return new ConfigSiteResource($configSite);
    }

    public function destroy(Request $request, ConfigSite $configSite): Response
    {
        $this->authorize('delete', $configSite);

        if ($configSite->image) {
            Storage::delete($configSite->image);
        }

        $configSite->delete();

        return response()->noContent();
    }
}
