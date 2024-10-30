<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FormationDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormationDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the formationDetail can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list formationdetails');
    }

    /**
     * Determine whether the formationDetail can view the model.
     */
    public function view(User $user, FormationDetail $model): bool
    {
        return $user->hasPermissionTo('view formationdetails');
    }

    /**
     * Determine whether the formationDetail can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create formationdetails');
    }

    /**
     * Determine whether the formationDetail can update the model.
     */
    public function update(User $user, FormationDetail $model): bool
    {
        return $user->hasPermissionTo('update formationdetails');
    }

    /**
     * Determine whether the formationDetail can delete the model.
     */
    public function delete(User $user, FormationDetail $model): bool
    {
        return $user->hasPermissionTo('delete formationdetails');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete formationdetails');
    }

    /**
     * Determine whether the formationDetail can restore the model.
     */
    public function restore(User $user, FormationDetail $model): bool
    {
        return false;
    }

    /**
     * Determine whether the formationDetail can permanently delete the model.
     */
    public function forceDelete(User $user, FormationDetail $model): bool
    {
        return false;
    }
}
