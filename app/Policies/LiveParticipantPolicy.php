<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LiveParticipant;
use Illuminate\Auth\Access\HandlesAuthorization;

class LiveParticipantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the liveParticipant can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list liveparticipants');
    }

    /**
     * Determine whether the liveParticipant can view the model.
     */
    public function view(User $user, LiveParticipant $model): bool
    {
        return $user->hasPermissionTo('view liveparticipants');
    }

    /**
     * Determine whether the liveParticipant can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create liveparticipants');
    }

    /**
     * Determine whether the liveParticipant can update the model.
     */
    public function update(User $user, LiveParticipant $model): bool
    {
        return $user->hasPermissionTo('update liveparticipants');
    }

    /**
     * Determine whether the liveParticipant can delete the model.
     */
    public function delete(User $user, LiveParticipant $model): bool
    {
        return $user->hasPermissionTo('delete liveparticipants');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete liveparticipants');
    }

    /**
     * Determine whether the liveParticipant can restore the model.
     */
    public function restore(User $user, LiveParticipant $model): bool
    {
        return false;
    }

    /**
     * Determine whether the liveParticipant can permanently delete the model.
     */
    public function forceDelete(User $user, LiveParticipant $model): bool
    {
        return false;
    }
}
