<?php

namespace App\Http\Controllers\Api;

use App\Models\ConfigKey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConfigSiteResource;
use App\Http\Resources\ConfigSiteCollection;

class ConfigKeyConfigSitesController extends Controller
{
    public function index(
        Request $request,
        ConfigKey $configKey
    ): ConfigSiteCollection {
        $this->authorize('view', $configKey);

        $search = $request->get('search', '');

        $configSites = $configKey
            ->configSites()
            ->search($search)
            ->latest()
            ->paginate();

        return new ConfigSiteCollection($configSites);
    }

    public function store(
        Request $request,
        ConfigKey $configKey
    ): ConfigSiteResource {
        $this->authorize('create', ConfigSite::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'description' => ['nullable', 'max:255', 'string'],
            'active' => ['nullable', 'boolean'],
            'url' => ['nullable', 'url'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $configSite = $configKey->configSites()->create($validated);

        return new ConfigSiteResource($configSite);
    }
}
