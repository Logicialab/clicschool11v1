<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Level;
use Illuminate\Auth\Access\HandlesAuthorization;

class LevelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the level can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list levels');
    }

    /**
     * Determine whether the level can view the model.
     */
    public function view(User $user, Level $model): bool
    {
        return $user->hasPermissionTo('view levels');
    }

    /**
     * Determine whether the level can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create levels');
    }

    /**
     * Determine whether the level can update the model.
     */
    public function update(User $user, Level $model): bool
    {
        return $user->hasPermissionTo('update levels');
    }

    /**
     * Determine whether the level can delete the model.
     */
    public function delete(User $user, Level $model): bool
    {
        return $user->hasPermissionTo('delete levels');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete levels');
    }

    /**
     * Determine whether the level can restore the model.
     */
    public function restore(User $user, Level $model): bool
    {
        return false;
    }

    /**
     * Determine whether the level can permanently delete the model.
     */
    public function forceDelete(User $user, Level $model): bool
    {
        return false;
    }
}
