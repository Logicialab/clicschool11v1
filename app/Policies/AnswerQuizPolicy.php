<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AnswerQuiz;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerQuizPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the answerQuiz can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list answerquizs');
    }

    /**
     * Determine whether the answerQuiz can view the model.
     */
    public function view(User $user, AnswerQuiz $model): bool
    {
        return $user->hasPermissionTo('view answerquizs');
    }

    /**
     * Determine whether the answerQuiz can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create answerquizs');
    }

    /**
     * Determine whether the answerQuiz can update the model.
     */
    public function update(User $user, AnswerQuiz $model): bool
    {
        return $user->hasPermissionTo('update answerquizs');
    }

    /**
     * Determine whether the answerQuiz can delete the model.
     */
    public function delete(User $user, AnswerQuiz $model): bool
    {
        return $user->hasPermissionTo('delete answerquizs');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete answerquizs');
    }

    /**
     * Determine whether the answerQuiz can restore the model.
     */
    public function restore(User $user, AnswerQuiz $model): bool
    {
        return false;
    }

    /**
     * Determine whether the answerQuiz can permanently delete the model.
     */
    public function forceDelete(User $user, AnswerQuiz $model): bool
    {
        return false;
    }
}
