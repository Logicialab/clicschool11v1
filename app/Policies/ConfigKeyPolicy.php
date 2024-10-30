<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ConfigKey;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConfigKeyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the configKey can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list configkeys');
    }

    /**
     * Determine whether the configKey can view the model.
     */
    public function view(User $user, ConfigKey $model): bool
    {
        return $user->hasPermissionTo('view configkeys');
    }

    /**
     * Determine whether the configKey can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create configkeys');
    }

    /**
     * Determine whether the configKey can update the model.
     */
    public function update(User $user, ConfigKey $model): bool
    {
        return $user->hasPermissionTo('update configkeys');
    }

    /**
     * Determine whether the configKey can delete the model.
     */
    public function delete(User $user, ConfigKey $model): bool
    {
        return $user->hasPermissionTo('delete configkeys');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete configkeys');
    }

    /**
     * Determine whether the configKey can restore the model.
     */
    public function restore(User $user, ConfigKey $model): bool
    {
        return false;
    }

    /**
     * Determine whether the configKey can permanently delete the model.
     */
    public function forceDelete(User $user, ConfigKey $model): bool
    {
        return false;
    }
}
