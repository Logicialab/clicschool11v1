<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the subject can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list subjects');
    }

    /**
     * Determine whether the subject can view the model.
     */
    public function view(User $user, Subject $model): bool
    {
        return $user->hasPermissionTo('view subjects');
    }

    /**
     * Determine whether the subject can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create subjects');
    }

    /**
     * Determine whether the subject can update the model.
     */
    public function update(User $user, Subject $model): bool
    {
        return $user->hasPermissionTo('update subjects');
    }

    /**
     * Determine whether the subject can delete the model.
     */
    public function delete(User $user, Subject $model): bool
    {
        return $user->hasPermissionTo('delete subjects');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete subjects');
    }

    /**
     * Determine whether the subject can restore the model.
     */
    public function restore(User $user, Subject $model): bool
    {
        return false;
    }

    /**
     * Determine whether the subject can permanently delete the model.
     */
    public function forceDelete(User $user, Subject $model): bool
    {
        return false;
    }
}
