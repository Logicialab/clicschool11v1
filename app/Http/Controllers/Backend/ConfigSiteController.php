<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Models\ConfigKey;
use App\Models\ConfigSite;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\ConfigSiteStoreRequest;
use App\Http\Requests\Backend\ConfigSiteUpdateRequest;

class ConfigSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ConfigSite::class);

        $search = $request->get('search', '');

        $configSites = ConfigSite::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.config_sites.index',
            compact('configSites', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ConfigSite::class);

        $configKeys = ConfigKey::pluck('name', 'id');

        return view('backend.config_sites.create', compact('configKeys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConfigSiteStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ConfigSite::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $configSite = ConfigSite::create($validated);

        return redirect()
            ->route('config-sites.edit', $configSite)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ConfigSite $configSite): View
    {
        $this->authorize('view', $configSite);

        return view('backend.config_sites.show', compact('configSite'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ConfigSite $configSite): View
    {
        $this->authorize('update', $configSite);

        $configKeys = ConfigKey::pluck('name', 'id');

        return view(
            'backend.config_sites.edit',
            compact('configSite', 'configKeys')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ConfigSiteUpdateRequest $request,
        ConfigSite $configSite
    ): RedirectResponse {
        $this->authorize('update', $configSite);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($configSite->image) {
                Storage::delete($configSite->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $configSite->update($validated);

        return redirect()
            ->route('config-sites.edit', $configSite)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ConfigSite $configSite
    ): RedirectResponse {
        $this->authorize('delete', $configSite);

        if ($configSite->image) {
            Storage::delete($configSite->image);
        }

        $configSite->delete();

        return redirect()
            ->route('config-sites.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
