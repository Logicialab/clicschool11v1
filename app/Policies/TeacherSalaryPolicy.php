<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TeacherSalary;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherSalaryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the teacherSalary can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list teachersalaries');
    }

    /**
     * Determine whether the teacherSalary can view the model.
     */
    public function view(User $user, TeacherSalary $model): bool
    {
        return $user->hasPermissionTo('view teachersalaries');
    }

    /**
     * Determine whether the teacherSalary can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create teachersalaries');
    }

    /**
     * Determine whether the teacherSalary can update the model.
     */
    public function update(User $user, TeacherSalary $model): bool
    {
        return $user->hasPermissionTo('update teachersalaries');
    }

    /**
     * Determine whether the teacherSalary can delete the model.
     */
    public function delete(User $user, TeacherSalary $model): bool
    {
        return $user->hasPermissionTo('delete teachersalaries');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete teachersalaries');
    }

    /**
     * Determine whether the teacherSalary can restore the model.
     */
    public function restore(User $user, TeacherSalary $model): bool
    {
        return false;
    }

    /**
     * Determine whether the teacherSalary can permanently delete the model.
     */
    public function forceDelete(User $user, TeacherSalary $model): bool
    {
        return false;
    }
}
