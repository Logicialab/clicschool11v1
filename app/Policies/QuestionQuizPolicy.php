<?php

namespace App\Policies;

use App\Models\User;
use App\Models\QuestionQuiz;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionQuizPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the questionQuiz can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list questionquizs');
    }

    /**
     * Determine whether the questionQuiz can view the model.
     */
    public function view(User $user, QuestionQuiz $model): bool
    {
        return $user->hasPermissionTo('view questionquizs');
    }

    /**
     * Determine whether the questionQuiz can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create questionquizs');
    }

    /**
     * Determine whether the questionQuiz can update the model.
     */
    public function update(User $user, QuestionQuiz $model): bool
    {
        return $user->hasPermissionTo('update questionquizs');
    }

    /**
     * Determine whether the questionQuiz can delete the model.
     */
    public function delete(User $user, QuestionQuiz $model): bool
    {
        return $user->hasPermissionTo('delete questionquizs');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete questionquizs');
    }

    /**
     * Determine whether the questionQuiz can restore the model.
     */
    public function restore(User $user, QuestionQuiz $model): bool
    {
        return false;
    }

    /**
     * Determine whether the questionQuiz can permanently delete the model.
     */
    public function forceDelete(User $user, QuestionQuiz $model): bool
    {
        return false;
    }
}
