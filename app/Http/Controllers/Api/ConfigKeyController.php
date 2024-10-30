<?php

namespace App\Http\Controllers\Api;

use App\Models\ConfigKey;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConfigKeyResource;
use App\Http\Resources\ConfigKeyCollection;
use App\Http\Requests\Backend\ConfigKeyStoreRequest;
use App\Http\Requests\Backend\ConfigKeyUpdateRequest;

class ConfigKeyController extends Controller
{
    public function index(Request $request): ConfigKeyCollection
    {
        $this->authorize('view-any', ConfigKey::class);

        $search = $request->get('search', '');

        $configKeys = ConfigKey::search($search)
            ->latest()
            ->paginate();

        return new ConfigKeyCollection($configKeys);
    }

    public function store(ConfigKeyStoreRequest $request): ConfigKeyResource
    {
        $this->authorize('create', ConfigKey::class);

        $validated = $request->validated();

        $configKey = ConfigKey::create($validated);

        return new ConfigKeyResource($configKey);
    }

    public function show(
        Request $request,
        ConfigKey $configKey
    ): ConfigKeyResource {
        $this->authorize('view', $configKey);

        return new ConfigKeyResource($configKey);
    }

    public function update(
        ConfigKeyUpdateRequest $request,
        ConfigKey $configKey
    ): ConfigKeyResource {
        $this->authorize('update', $configKey);

        $validated = $request->validated();

        $configKey->update($validated);

        return new ConfigKeyResource($configKey);
    }

    public function destroy(Request $request, ConfigKey $configKey): Response
    {
        $this->authorize('delete', $configKey);

        $configKey->delete();

        return response()->noContent();
    }
}
