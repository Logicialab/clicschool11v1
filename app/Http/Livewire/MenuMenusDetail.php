<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MenuMenusDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Menu $menu;
    // public Menu $menu;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Menu';

    protected $rules = [
        'menu.title' => ['required', 'max:255', 'string'],
        'menu.url' => ['required', 'url'],
    ];

    public function mount(Menu $menu): void
    {
        $this->menu = $menu;
        $this->resetMenuData();
    }

    public function resetMenuData(): void
    {
        $this->menu = new Menu();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newMenu(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.menu_menus.new_title');
        $this->resetMenuData();

        $this->showModal();
    }

    public function editMenu(Menu $menu): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.menu_menus.edit_title');
        $this->menu = $menu;

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

        if (!$this->menu->menu_id) {
            $this->authorize('create', Menu::class);

            $this->menu->menu_id = $this->menu->id;
        } else {
            $this->authorize('update', $this->menu);
        }

        $this->menu->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Menu::class);

        Menu::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetMenuData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->menu->menus as $menu) {
            array_push($this->selected, $menu->id);
        }
    }

    public function render(): View
    {
        return view('livewire.menu-menus-detail', [
            'menus' => $this->menu->menus()->paginate(20),
        ]);
    }
}
