<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\User;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Models\Subscription;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PlanSubscriptionsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Plan $plan;
    public Subscription $subscription;
    public $usersForSelect = [];
    public $subscriptionStartDate;
    public $subscriptionEndDate;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Subscription';

    protected $rules = [
        'subscription.user_id' => ['required', 'exists:users,id'],
        'subscriptionStartDate' => ['required', 'date'],
        'subscriptionEndDate' => ['required', 'date'],
        'subscription.status' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(Plan $plan): void
    {
        $this->plan = $plan;
        $this->usersForSelect = User::pluck('name', 'id');
        $this->resetSubscriptionData();
    }

    public function resetSubscriptionData(): void
    {
        $this->subscription = new Subscription();

        $this->subscriptionStartDate = null;
        $this->subscriptionEndDate = null;
        $this->subscription->user_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newSubscription(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.plan_subscriptions.new_title');
        $this->resetSubscriptionData();

        $this->showModal();
    }

    public function editSubscription(Subscription $subscription): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.plan_subscriptions.edit_title');
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

        if (!$this->subscription->plan_id) {
            $this->authorize('create', Subscription::class);

            $this->subscription->plan_id = $this->plan->id;
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

        foreach ($this->plan->subscriptions as $subscription) {
            array_push($this->selected, $subscription->id);
        }
    }

    public function render(): View
    {
        return view('livewire.plan-subscriptions-detail', [
            'subscriptions' => $this->plan->subscriptions()->paginate(20),
        ]);
    }
}
