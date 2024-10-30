<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Auth\Access\HandlesAuthorization;

class WalletPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the wallet can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list wallets');
    }

    /**
     * Determine whether the wallet can view the model.
     */
    public function view(User $user, Wallet $model): bool
    {
        return $user->hasPermissionTo('view wallets');
    }

    /**
     * Determine whether the wallet can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create wallets');
    }

    /**
     * Determine whether the wallet can update the model.
     */
    public function update(User $user, Wallet $model): bool
    {
        return $user->hasPermissionTo('update wallets');
    }

    /**
     * Determine whether the wallet can delete the model.
     */
    public function delete(User $user, Wallet $model): bool
    {
        return $user->hasPermissionTo('delete wallets');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete wallets');
    }

    /**
     * Determine whether the wallet can restore the model.
     */
    public function restore(User $user, Wallet $model): bool
    {
        return false;
    }

    /**
     * Determine whether the wallet can permanently delete the model.
     */
    public function forceDelete(User $user, Wallet $model): bool
    {
        return false;
    }
}
