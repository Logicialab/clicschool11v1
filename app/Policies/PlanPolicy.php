<?php

namespace App\Policies;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the plan can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list plans');
    }

    /**
     * Determine whether the plan can view the model.
     */
    public function view(User $user, Plan $model): bool
    {
        return $user->hasPermissionTo('view plans');
    }

    /**
     * Determine whether the plan can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create plans');
    }

    /**
     * Determine whether the plan can update the model.
     */
    public function update(User $user, Plan $model): bool
    {
        return $user->hasPermissionTo('update plans');
    }

    /**
     * Determine whether the plan can delete the model.
     */
    public function delete(User $user, Plan $model): bool
    {
        return $user->hasPermissionTo('delete plans');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete plans');
    }

    /**
     * Determine whether the plan can restore the model.
     */
    public function restore(User $user, Plan $model): bool
    {
        return false;
    }

    /**
     * Determine whether the plan can permanently delete the model.
     */
    public function forceDelete(User $user, Plan $model): bool
    {
        return false;
    }
}
