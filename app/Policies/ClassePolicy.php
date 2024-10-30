<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Classe;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the classe can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list classes');
    }

    /**
     * Determine whether the classe can view the model.
     */
    public function view(User $user, Classe $model): bool
    {
        return $user->hasPermissionTo('view classes');
    }

    /**
     * Determine whether the classe can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create classes');
    }

    /**
     * Determine whether the classe can update the model.
     */
    public function update(User $user, Classe $model): bool
    {
        return $user->hasPermissionTo('update classes');
    }

    /**
     * Determine whether the classe can delete the model.
     */
    public function delete(User $user, Classe $model): bool
    {
        return $user->hasPermissionTo('delete classes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete classes');
    }

    /**
     * Determine whether the classe can restore the model.
     */
    public function restore(User $user, Classe $model): bool
    {
        return false;
    }

    /**
     * Determine whether the classe can permanently delete the model.
     */
    public function forceDelete(User $user, Classe $model): bool
    {
        return false;
    }
}
