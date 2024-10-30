<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Parente;
use Illuminate\View\View;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserParentesDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public User $user;
    public Parente $parente;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Parente';

    protected $rules = [
        'parente.first_name' => ['required', 'max:255', 'string'],
        'parente.last_name' => ['required', 'max:255', 'string'],
    ];

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->resetParenteData();
    }

    public function resetParenteData(): void
    {
        $this->parente = new Parente();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newParente(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.user_parentes.new_title');
        $this->resetParenteData();

        $this->showModal();
    }

    public function editParente(Parente $parente): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.user_parentes.edit_title');
        $this->parente = $parente;

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

        if (!$this->parente->user_id) {
            $this->authorize('create', Parente::class);

            $this->parente->user_id = $this->user->id;
        } else {
            $this->authorize('update', $this->parente);
        }

        $this->parente->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Parente::class);

        Parente::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetParenteData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->user->parentes as $parente) {
            array_push($this->selected, $parente->id);
        }
    }

    public function render(): View
    {
        return view('livewire.user-parentes-detail', [
            'parentes' => $this->user->parentes()->paginate(20),
        ]);
    }
}
