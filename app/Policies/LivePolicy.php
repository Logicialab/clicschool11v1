<?php

namespace App\Policies;

use App\Models\Live;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LivePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the live can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list lives');
    }

    /**
     * Determine whether the live can view the model.
     */
    public function view(User $user, Live $model): bool
    {
        return $user->hasPermissionTo('view lives');
    }

    /**
     * Determine whether the live can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create lives');
    }

    /**
     * Determine whether the live can update the model.
     */
    public function update(User $user, Live $model): bool
    {
        return $user->hasPermissionTo('update lives');
    }

    /**
     * Determine whether the live can delete the model.
     */
    public function delete(User $user, Live $model): bool
    {
        return $user->hasPermissionTo('delete lives');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete lives');
    }

    /**
     * Determine whether the live can restore the model.
     */
    public function restore(User $user, Live $model): bool
    {
        return false;
    }

    /**
     * Determine whether the live can permanently delete the model.
     */
    public function forceDelete(User $user, Live $model): bool
    {
        return false;
    }
}
