<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CompetitionQuestion;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetitionQuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the competitionQuestion can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list competitionquestions');
    }

    /**
     * Determine whether the competitionQuestion can view the model.
     */
    public function view(User $user, CompetitionQuestion $model): bool
    {
        return $user->hasPermissionTo('view competitionquestions');
    }

    /**
     * Determine whether the competitionQuestion can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create competitionquestions');
    }

    /**
     * Determine whether the competitionQuestion can update the model.
     */
    public function update(User $user, CompetitionQuestion $model): bool
    {
        return $user->hasPermissionTo('update competitionquestions');
    }

    /**
     * Determine whether the competitionQuestion can delete the model.
     */
    public function delete(User $user, CompetitionQuestion $model): bool
    {
        return $user->hasPermissionTo('delete competitionquestions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete competitionquestions');
    }

    /**
     * Determine whether the competitionQuestion can restore the model.
     */
    public function restore(User $user, CompetitionQuestion $model): bool
    {
        return false;
    }

    /**
     * Determine whether the competitionQuestion can permanently delete the model.
     */
    public function forceDelete(User $user, CompetitionQuestion $model): bool
    {
        return false;
    }
}
