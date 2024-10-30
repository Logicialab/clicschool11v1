<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ExerciseSolution;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExerciseSolutionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the exerciseSolution can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list exercisesolutions');
    }

    /**
     * Determine whether the exerciseSolution can view the model.
     */
    public function view(User $user, ExerciseSolution $model): bool
    {
        return $user->hasPermissionTo('view exercisesolutions');
    }

    /**
     * Determine whether the exerciseSolution can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create exercisesolutions');
    }

    /**
     * Determine whether the exerciseSolution can update the model.
     */
    public function update(User $user, ExerciseSolution $model): bool
    {
        return $user->hasPermissionTo('update exercisesolutions');
    }

    /**
     * Determine whether the exerciseSolution can delete the model.
     */
    public function delete(User $user, ExerciseSolution $model): bool
    {
        return $user->hasPermissionTo('delete exercisesolutions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete exercisesolutions');
    }

    /**
     * Determine whether the exerciseSolution can restore the model.
     */
    public function restore(User $user, ExerciseSolution $model): bool
    {
        return false;
    }

    /**
     * Determine whether the exerciseSolution can permanently delete the model.
     */
    public function forceDelete(User $user, ExerciseSolution $model): bool
    {
        return false;
    }
}
