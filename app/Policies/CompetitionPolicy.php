<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Competition;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetitionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the competition can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list competitions');
    }

    /**
     * Determine whether the competition can view the model.
     */
    public function view(User $user, Competition $model): bool
    {
        return $user->hasPermissionTo('view competitions');
    }

    /**
     * Determine whether the competition can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create competitions');
    }

    /**
     * Determine whether the competition can update the model.
     */
    public function update(User $user, Competition $model): bool
    {
        return $user->hasPermissionTo('update competitions');
    }

    /**
     * Determine whether the competition can delete the model.
     */
    public function delete(User $user, Competition $model): bool
    {
        return $user->hasPermissionTo('delete competitions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete competitions');
    }

    /**
     * Determine whether the competition can restore the model.
     */
    public function restore(User $user, Competition $model): bool
    {
        return false;
    }

    /**
     * Determine whether the competition can permanently delete the model.
     */
    public function forceDelete(User $user, Competition $model): bool
    {
        return false;
    }
}
