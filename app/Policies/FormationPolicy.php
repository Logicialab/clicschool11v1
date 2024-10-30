<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Formation;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the formation can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list formations');
    }

    /**
     * Determine whether the formation can view the model.
     */
    public function view(User $user, Formation $model): bool
    {
        return $user->hasPermissionTo('view formations');
    }

    /**
     * Determine whether the formation can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create formations');
    }

    /**
     * Determine whether the formation can update the model.
     */
    public function update(User $user, Formation $model): bool
    {
        return $user->hasPermissionTo('update formations');
    }

    /**
     * Determine whether the formation can delete the model.
     */
    public function delete(User $user, Formation $model): bool
    {
        return $user->hasPermissionTo('delete formations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete formations');
    }

    /**
     * Determine whether the formation can restore the model.
     */
    public function restore(User $user, Formation $model): bool
    {
        return false;
    }

    /**
     * Determine whether the formation can permanently delete the model.
     */
    public function forceDelete(User $user, Formation $model): bool
    {
        return false;
    }
}
