<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Plan;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Models\Subscription;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserSubscriptionsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public User $user;
    public Subscription $subscription;
    public $plansForSelect = [];
    public $subscriptionStartDate;
    public $subscriptionEndDate;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Subscription';

    protected $rules = [
        'subscription.plan_id' => ['required', 'exists:plans,id'],
        'subscriptionStartDate' => ['required', 'date'],
        'subscriptionEndDate' => ['required', 'date'],
        'subscription.status' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->plansForSelect = Plan::pluck('name', 'id');
        $this->resetSubscriptionData();
    }

    public function resetSubscriptionData(): void
    {
        $this->subscription = new Subscription();

        $this->subscriptionStartDate = null;
        $this->subscriptionEndDate = null;
        $this->subscription->plan_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newSubscription(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.user_subscriptions.new_title');
        $this->resetSubscriptionData();

        $this->showModal();
    }

    public function editSubscription(Subscription $subscription): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.user_subscriptions.edit_title');
        $this->subscription = $subscription;

        $this->subscriptionStartDate = optional(
            $this->subscription->start_date
        )->format('Y-m-d');
        $this->subscriptionEndDate = optional(
            $this->subscription->end_date
        )->format('Y-m-d');

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

        if (!$this->subscription->user_id) {
            $this->authorize('create', Subscription::class);

            $this->subscription->user_id = $this->user->id;
        } else {
            $this->authorize('update', $this->subscription);
        }

        $this->subscription->start_date = \Carbon\Carbon::make(
            $this->subscriptionStartDate
        );
        $this->subscription->end_date = \Carbon\Carbon::make(
            $this->subscriptionEndDate
        );

        $this->subscription->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Subscription::class);

        Subscription::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetSubscriptionData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->user->subscriptions as $subscription) {
            array_push($this->selected, $subscription->id);
        }
    }

    public function render(): View
    {
        return view('livewire.user-subscriptions-detail', [
            'subscriptions' => $this->user->subscriptions()->paginate(20),
        ]);
    }
}
