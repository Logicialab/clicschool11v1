<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StudentAnswerQuiz;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentAnswerQuizPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the studentAnswerQuiz can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list studentanswerquizs');
    }

    /**
     * Determine whether the studentAnswerQuiz can view the model.
     */
    public function view(User $user, StudentAnswerQuiz $model): bool
    {
        return $user->hasPermissionTo('view studentanswerquizs');
    }

    /**
     * Determine whether the studentAnswerQuiz can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create studentanswerquizs');
    }

    /**
     * Determine whether the studentAnswerQuiz can update the model.
     */
    public function update(User $user, StudentAnswerQuiz $model): bool
    {
        return $user->hasPermissionTo('update studentanswerquizs');
    }

    /**
     * Determine whether the studentAnswerQuiz can delete the model.
     */
    public function delete(User $user, StudentAnswerQuiz $model): bool
    {
        return $user->hasPermissionTo('delete studentanswerquizs');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete studentanswerquizs');
    }

    /**
     * Determine whether the studentAnswerQuiz can restore the model.
     */
    public function restore(User $user, StudentAnswerQuiz $model): bool
    {
        return false;
    }

    /**
     * Determine whether the studentAnswerQuiz can permanently delete the model.
     */
    public function forceDelete(User $user, StudentAnswerQuiz $model): bool
    {
        return false;
    }
}
