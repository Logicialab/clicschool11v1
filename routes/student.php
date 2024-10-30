<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\student\DashboardStudentController;
use App\Livewire\Student\Subject\StudentIndexSubject;

Route::prefix('/dashboard/student/')->middleware('auth')->group(function () {

    Route::get('/', [DashboardStudentController::class,'index'])->name('student.dashboard');
    
    
    Route::get('/subjects', [DashboardStudentController::class,'getUniqueSubjects'])->name('student.subjects');
    // Route::get('/subjects', StudentIndexSubject::class)->name('student.subjects');
    Route::get('/subjects/{slug}', [DashboardStudentController::class,'subjects_show'])->name('student.subjects.show');

    Route::get('/unitcourse/{slug}', [DashboardStudentController::class,'course_show'])->name('student.course.show');
    Route::get('/course/{slug}', [DashboardStudentController::class,'course_show_show'])->name('student.course.show_show');

    Route::get('/quiz/{slug}', [DashboardStudentController::class,'quiz_show'])->name('student.quiz.show');
    Route::get('/live/{slug}', [DashboardStudentController::class,'live_show'])->name('student.live.show');
    
    Route::get('/formations', [DashboardStudentController::class,'formations'])->name('student.formations');

    Route::get('/profile-edit', [DashboardStudentController::class,'profiledit'])->name('student.profiledit');
    Route::post('/profile-edit', [DashboardStudentController::class,'updateProfile'])->name('student.profile.update');


    Route::get('/courses', [DashboardStudentController::class,'courses'])->name('student.courses');
    Route::get('/reviews', [DashboardStudentController::class,'reviews'])->name('student.reviews');
    Route::get('/earning', [DashboardStudentController::class,'earnings'])->name('student.earnings');
    Route::get('/orders', [DashboardStudentController::class,'orders'])->name('student.orders');
    Route::get('/students', [DashboardStudentController::class,'students'])->name('student.students');
    Route::get('/payouts', [DashboardStudentController::class,'payouts'])->name('student.payouts');
    Route::get('/competition', [DashboardStudentController::class,'competition'])->name('student.competition');
    Route::get('/quizresult', [DashboardStudentController::class,'quizresult'])->name('student.quizresult');


    Route::get('/security', [DashboardStudentController::class,'security'])->name('student.security');
    Route::get('/social-profile', [DashboardStudentController::class,'socialprofile'])->name('student.socialprofile');
    Route::get('/notifications', [DashboardStudentController::class,'notifications'])->name('student.notifications');
    Route::get('/profile-privacy', [DashboardStudentController::class,'profileprivacy'])->name('student.profileprivacy');
    Route::get('/delete-profile', [DashboardStudentController::class,'deleteprofile'])->name('student.deleteprofile');
    Route::get('/linked-accounts', [DashboardStudentController::class,'linkedaccounts'])->name('student.linkedaccounts');

    Route::get('/subscriptions', [DashboardStudentController::class,'subscriptions'])->name('student.subscriptions');
    Route::get('/billinginfo', [DashboardStudentController::class,'billinginfo'])->name('student.billinginfo');
    Route::get('/paymentmethod', [DashboardStudentController::class,'paymentmethod'])->name('student.paymentmethod');
    Route::get('/invoice', [DashboardStudentController::class,'invoice'])->name('student.invoice');
    Route::get('/studentquiz', [DashboardStudentController::class,'studentquiz'])->name('student.studentquiz');
});

