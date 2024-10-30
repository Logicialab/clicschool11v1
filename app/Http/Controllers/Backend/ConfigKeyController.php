<?php

namespace App\Http\Controllers\Backend;

use App\Models\ConfigKey;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\ConfigKeyStoreRequest;
use App\Http\Requests\Backend\ConfigKeyUpdateRequest;

class ConfigKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ConfigKey::class);

        $search = $request->get('search', '');

        $configKeys = ConfigKey::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.config_keys.index',
            compact('configKeys', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ConfigKey::class);

        return view('backend.config_keys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConfigKeyStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ConfigKey::class);

        $validated = $request->validated();

        $configKey = ConfigKey::create($validated);

        return redirect()
            ->route('config-keys.edit', $configKey)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ConfigKey $configKey): View
    {
        $this->authorize('view', $configKey);

        return view('backend.config_keys.show', compact('configKey'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ConfigKey $configKey): View
    {
        $this->authorize('update', $configKey);

        return view('backend.config_keys.edit', compact('configKey'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ConfigKeyUpdateRequest $request,
        ConfigKey $configKey
    ): RedirectResponse {
        $this->authorize('update', $configKey);

        $validated = $request->validated();

        $configKey->update($validated);

        return redirect()
            ->route('config-keys.edit', $configKey)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ConfigKey $configKey
    ): RedirectResponse {
        $this->authorize('delete', $configKey);

        $configKey->delete();

        return redirect()
            ->route('config-keys.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
