<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TeacherPayment;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPaymentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the teacherPayment can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list teacherpayments');
    }

    /**
     * Determine whether the teacherPayment can view the model.
     */
    public function view(User $user, TeacherPayment $model): bool
    {
        return $user->hasPermissionTo('view teacherpayments');
    }

    /**
     * Determine whether the teacherPayment can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create teacherpayments');
    }

    /**
     * Determine whether the teacherPayment can update the model.
     */
    public function update(User $user, TeacherPayment $model): bool
    {
        return $user->hasPermissionTo('update teacherpayments');
    }

    /**
     * Determine whether the teacherPayment can delete the model.
     */
    public function delete(User $user, TeacherPayment $model): bool
    {
        return $user->hasPermissionTo('delete teacherpayments');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete teacherpayments');
    }

    /**
     * Determine whether the teacherPayment can restore the model.
     */
    public function restore(User $user, TeacherPayment $model): bool
    {
        return false;
    }

    /**
     * Determine whether the teacherPayment can permanently delete the model.
     */
    public function forceDelete(User $user, TeacherPayment $model): bool
    {
        return false;
    }
}
