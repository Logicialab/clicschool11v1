<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\CreateAccount;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\AuthController;
use App\Http\Controllers\Public\IndexController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\PricingController;
use App\Http\Controllers\Public\TeachersController;
use App\Http\Controllers\Public\FormationController;
use App\Http\Controllers\Public\FormationsController;

use App\Livewire\Public\Pages\FormationSingle;
use App\Livewire\Public\Pages\IndexPage;

Route::get('/الدورة/{slug}', FormationSingle::class)->name("formation.show");


// Route::get('/', [IndexController::class, 'index'])->name('public.index');
Route::get('/',IndexPage::class)->name("indexpage");


Route::get('/about', [AboutController::class, 'index']);


Route::get('/formations', [FormationsController::class, 'index'])->name('formations.index');


// Route::get('/formations-single', [FormationsController::class, 'show_old']);

// Route::get('/الدورة/{slug}', [FormationsController::class, 'show'])->name("formation.show");


Route::get('/teacher-profile', [TeachersController::class, 'show']);
Route::get('/teacher-profile/{slug}', [TeachersController::class, 'show_slug'])->name("teacher.show_slug");


Route::get('/pricing', [PricingController::class, 'index']);


Route::get('/pricing/details', [PricingController::class, 'show']);


Route::get('/contact', [ContactController::class, 'index']);


Route::get('/account/create', [CreateAccount::class, 'index'])->name("create-account-student");


Route::get('/account/parent', [CreateAccount::class, 'indexParent']);


Route::post('/store/account', [CreateAccount::class, 'store'])->name('account.store');


Route::post('/store/accountparent', [CreateAccount::class, 'storeParent'])->name('parent.store');

Route::post('/account/login', [AuthController::class, 'login'])->name('public.login');
Route::get('/account/login', [AuthController::class, 'get_login'])->name('login');