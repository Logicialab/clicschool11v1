<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\ConfigKey;
use App\Models\ConfigSite;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ConfigKeyConfigSitesDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public ConfigKey $configKey;
    public ConfigSite $configSite;
    public $configSiteImage;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New ConfigSite';

    protected $rules = [
        'configSite.title' => ['required', 'max:255', 'string'],
        'configSiteImage' => ['nullable', 'image', 'max:1024'],
        'configSite.description' => ['nullable', 'max:255', 'string'],
        'configSite.active' => ['nullable', 'boolean'],
        'configSite.url' => ['nullable', 'url'],
    ];

    public function mount(ConfigKey $configKey): void
    {
        $this->configKey = $configKey;
        $this->resetConfigSiteData();
    }

    public function resetConfigSiteData(): void
    {
        $this->configSite = new ConfigSite();

        $this->configSiteImage = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newConfigSite(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.config_key_config_sites.new_title');
        $this->resetConfigSiteData();

        $this->showModal();
    }

    public function editConfigSite(ConfigSite $configSite): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.config_key_config_sites.edit_title');
        $this->configSite = $configSite;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        if (!$this->configSite->config_key_id) {
            $this->authorize('create', ConfigSite::class);

            $this->configSite->config_key_id = $this->configKey->id;
        } else {
            $this->authorize('update', $this->configSite);
        }

        if ($this->configSiteImage) {
            $this->configSite->image = $this->configSiteImage->store('public');
        }

        $this->configSite->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', ConfigSite::class);

        collect($this->selected)->each(function (string $id) {
            $configSite = ConfigSite::findOrFail($id);

            if ($configSite->image) {
                Storage::delete($configSite->image);
            }

            $configSite->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetConfigSiteData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->configKey->configSites as $configSite) {
            array_push($this->selected, $configSite->id);
        }
    }

    public function render(): View
    {
        return view('livewire.config-key-config-sites-detail', [
            'configSites' => $this->configKey->configSites()->paginate(20),
        ]);
    }
}
