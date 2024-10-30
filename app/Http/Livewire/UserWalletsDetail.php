<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Wallet;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserWalletsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public User $user;
    public Wallet $wallet;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Wallet';

    protected $rules = [
        'wallet.balance' => ['required', 'numeric'],
    ];

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->resetWalletData();
    }

    public function resetWalletData(): void
    {
        $this->wallet = new Wallet();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newWallet(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.user_wallets.new_title');
        $this->resetWalletData();

        $this->showModal();
    }

    public function editWallet(Wallet $wallet): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.user_wallets.edit_title');
        $this->wallet = $wallet;

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

        if (!$this->wallet->user_id) {
            $this->authorize('create', Wallet::class);

            $this->wallet->user_id = $this->user->id;
        } else {
            $this->authorize('update', $this->wallet);
        }

        $this->wallet->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Wallet::class);

        Wallet::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetWalletData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->user->wallets as $wallet) {
            array_push($this->selected, $wallet->id);
        }
    }

    public function render(): View
    {
        return view('livewire.user-wallets-detail', [
            'wallets' => $this->user->wallets()->paginate(20),
        ]);
    }
}
