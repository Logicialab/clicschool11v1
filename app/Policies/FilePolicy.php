<?php

namespace App\Policies;

use App\Models\File;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the file can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list files');
    }

    /**
     * Determine whether the file can view the model.
     */
    public function view(User $user, File $model): bool
    {
        return $user->hasPermissionTo('view files');
    }

    /**
     * Determine whether the file can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create files');
    }

    /**
     * Determine whether the file can update the model.
     */
    public function update(User $user, File $model): bool
    {
        return $user->hasPermissionTo('update files');
    }

    /**
     * Determine whether the file can delete the model.
     */
    public function delete(User $user, File $model): bool
    {
        return $user->hasPermissionTo('delete files');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete files');
    }

    /**
     * Determine whether the file can restore the model.
     */
    public function restore(User $user, File $model): bool
    {
        return false;
    }

    /**
     * Determine whether the file can permanently delete the model.
     */
    public function forceDelete(User $user, File $model): bool
    {
        return false;
    }
}
