<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CompetitionAnswer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetitionAnswerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the competitionAnswer can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list competitionanswers');
    }

    /**
     * Determine whether the competitionAnswer can view the model.
     */
    public function view(User $user, CompetitionAnswer $model): bool
    {
        return $user->hasPermissionTo('view competitionanswers');
    }

    /**
     * Determine whether the competitionAnswer can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create competitionanswers');
    }

    /**
     * Determine whether the competitionAnswer can update the model.
     */
    public function update(User $user, CompetitionAnswer $model): bool
    {
        return $user->hasPermissionTo('update competitionanswers');
    }

    /**
     * Determine whether the competitionAnswer can delete the model.
     */
    public function delete(User $user, CompetitionAnswer $model): bool
    {
        return $user->hasPermissionTo('delete competitionanswers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete competitionanswers');
    }

    /**
     * Determine whether the competitionAnswer can restore the model.
     */
    public function restore(User $user, CompetitionAnswer $model): bool
    {
        return false;
    }

    /**
     * Determine whether the competitionAnswer can permanently delete the model.
     */
    public function forceDelete(User $user, CompetitionAnswer $model): bool
    {
        return false;
    }
}
