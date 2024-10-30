<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Parente;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParentePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the parente can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list parentes');
    }

    /**
     * Determine whether the parente can view the model.
     */
    public function view(User $user, Parente $model): bool
    {
        return $user->hasPermissionTo('view parentes');
    }

    /**
     * Determine whether the parente can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create parentes');
    }

    /**
     * Determine whether the parente can update the model.
     */
    public function update(User $user, Parente $model): bool
    {
        return $user->hasPermissionTo('update parentes');
    }

    /**
     * Determine whether the parente can delete the model.
     */
    public function delete(User $user, Parente $model): bool
    {
        return $user->hasPermissionTo('delete parentes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete parentes');
    }

    /**
     * Determine whether the parente can restore the model.
     */
    public function restore(User $user, Parente $model): bool
    {
        return false;
    }

    /**
     * Determine whether the parente can permanently delete the model.
     */
    public function forceDelete(User $user, Parente $model): bool
    {
        return false;
    }
}
