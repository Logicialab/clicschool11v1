<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ConfigSite;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConfigSitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the configSite can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list configsites');
    }

    /**
     * Determine whether the configSite can view the model.
     */
    public function view(User $user, ConfigSite $model): bool
    {
        return $user->hasPermissionTo('view configsites');
    }

    /**
     * Determine whether the configSite can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create configsites');
    }

    /**
     * Determine whether the configSite can update the model.
     */
    public function update(User $user, ConfigSite $model): bool
    {
        return $user->hasPermissionTo('update configsites');
    }

    /**
     * Determine whether the configSite can delete the model.
     */
    public function delete(User $user, ConfigSite $model): bool
    {
        return $user->hasPermissionTo('delete configsites');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete configsites');
    }

    /**
     * Determine whether the configSite can restore the model.
     */
    public function restore(User $user, ConfigSite $model): bool
    {
        return false;
    }

    /**
     * Determine whether the configSite can permanently delete the model.
     */
    public function forceDelete(User $user, ConfigSite $model): bool
    {
        return false;
    }
}
