<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Partner;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the partner can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list partners');
    }

    /**
     * Determine whether the partner can view the model.
     */
    public function view(User $user, Partner $model): bool
    {
        return $user->hasPermissionTo('view partners');
    }

    /**
     * Determine whether the partner can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create partners');
    }

    /**
     * Determine whether the partner can update the model.
     */
    public function update(User $user, Partner $model): bool
    {
        return $user->hasPermissionTo('update partners');
    }

    /**
     * Determine whether the partner can delete the model.
     */
    public function delete(User $user, Partner $model): bool
    {
        return $user->hasPermissionTo('delete partners');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete partners');
    }

    /**
     * Determine whether the partner can restore the model.
     */
    public function restore(User $user, Partner $model): bool
    {
        return false;
    }

    /**
     * Determine whether the partner can permanently delete the model.
     */
    public function forceDelete(User $user, Partner $model): bool
    {
        return false;
    }
}
