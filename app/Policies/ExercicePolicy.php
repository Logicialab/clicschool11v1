<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Exercice;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExercicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the exercice can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list exercices');
    }

    /**
     * Determine whether the exercice can view the model.
     */
    public function view(User $user, Exercice $model): bool
    {
        return $user->hasPermissionTo('view exercices');
    }

    /**
     * Determine whether the exercice can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create exercices');
    }

    /**
     * Determine whether the exercice can update the model.
     */
    public function update(User $user, Exercice $model): bool
    {
        return $user->hasPermissionTo('update exercices');
    }

    /**
     * Determine whether the exercice can delete the model.
     */
    public function delete(User $user, Exercice $model): bool
    {
        return $user->hasPermissionTo('delete exercices');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete exercices');
    }

    /**
     * Determine whether the exercice can restore the model.
     */
    public function restore(User $user, Exercice $model): bool
    {
        return false;
    }

    /**
     * Determine whether the exercice can permanently delete the model.
     */
    public function forceDelete(User $user, Exercice $model): bool
    {
        return false;
    }
}
