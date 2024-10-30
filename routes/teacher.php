<?php

use App\Http\Controllers\teacher\DashboardTeacherController;
use Illuminate\Support\Facades\Route;


Route::prefix('/dashboard/teacher')
    ->middleware(['auth'])
    ->group(function () {

    Route::get('/', [DashboardTeacherController::class,'index'])->name('teacher.dashboard');
    Route::get('/formations', [DashboardTeacherController::class,'formations'])->name('teacher.formations');
    Route::get('/formation/create', [DashboardTeacherController::class,'formation_create'])->name('teacher.formation.create');
    Route::post('/formation/store', [DashboardTeacherController::class,'formation_store'])->name('teacher.formation.store');

    Route::get('/courses', [DashboardTeacherController::class,'courses'])->name('teacher.courses');
    Route::get('/course/{slug}', [DashboardTeacherController::class,'course_show'])->name('teacher.course.show');

    Route::get('/reviews', [DashboardTeacherController::class,'reviews'])->name('teacher.reviews');
    Route::get('/earning', [DashboardTeacherController::class,'earnings'])->name('teacher.earnings');
    Route::get('/orders', [DashboardTeacherController::class,'orders'])->name('teacher.orders');
    Route::get('/students', [DashboardTeacherController::class,'students'])->name('teacher.students');
    Route::get('/payouts', [DashboardTeacherController::class,'payouts'])->name('teacher.payouts');
    Route::get('/quiz', [DashboardTeacherController::class,'quiz'])->name('teacher.quiz');
    Route::get('/quizresult', [DashboardTeacherController::class,'quizresult'])->name('teacher.quizresult');
    Route::get('/profile-edit', [DashboardTeacherController::class,'profiledit'])->name('teacher.profiledit');
    Route::get('/security', [DashboardTeacherController::class,'security'])->name('teacher.security');
    Route::get('/social-profile', [DashboardTeacherController::class,'socialprofile'])->name('teacher.socialprofile');
    Route::get('/notifications', [DashboardTeacherController::class,'notifications'])->name('teacher.notifications');
    Route::get('/profile-privacy', [DashboardTeacherController::class,'profileprivacy'])->name('teacher.profileprivacy');
    Route::get('/delete-profile', [DashboardTeacherController::class,'deleteprofile'])->name('teacher.deleteprofile');
    Route::get('/linked-accounts', [DashboardTeacherController::class,'linkedaccounts'])->name('teacher.linkedaccounts');
});

