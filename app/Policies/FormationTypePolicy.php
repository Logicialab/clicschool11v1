<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FormationType;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormationTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the formationType can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list formationtypes');
    }

    /**
     * Determine whether the formationType can view the model.
     */
    public function view(User $user, FormationType $model): bool
    {
        return $user->hasPermissionTo('view formationtypes');
    }

    /**
     * Determine whether the formationType can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create formationtypes');
    }

    /**
     * Determine whether the formationType can update the model.
     */
    public function update(User $user, FormationType $model): bool
    {
        return $user->hasPermissionTo('update formationtypes');
    }

    /**
     * Determine whether the formationType can delete the model.
     */
    public function delete(User $user, FormationType $model): bool
    {
        return $user->hasPermissionTo('delete formationtypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete formationtypes');
    }

    /**
     * Determine whether the formationType can restore the model.
     */
    public function restore(User $user, FormationType $model): bool
    {
        return false;
    }

    /**
     * Determine whether the formationType can permanently delete the model.
     */
    public function forceDelete(User $user, FormationType $model): bool
    {
        return false;
    }
}
