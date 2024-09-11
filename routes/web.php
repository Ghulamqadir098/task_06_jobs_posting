<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('pages.auth.signin_form');
});

Route::prefix('dashboard')->group(function () {

    Route::middleware('auth')->group(function () {    
route::get('home',[DashboardController::class,'home'])->name('dashboard.home');
});

});


// Auth Routes 
Route::prefix('auth')->group(function () {
Route::view('signup_options','pages.auth.signup_options')->name('signup.options');
Route::get('signup_as_candidate_form',[AuthController::class,'candidate_form'])->name('signup.as_candidate');
Route::get('signup_as_employer_form',[AuthController::class,'employer_form'])->name('signup.as_employer');
Route::post('employer_signup',[AuthController::class,'employer_signup'])->name('signup.employer');
Route::post('candidate_signup',[AuthController::class,'candidate_sigup'])->name('signup.candidate');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
});



// Category related routes 
Route::prefix('category')->group(function () {
Route::middleware('role:super_admin')->group(function () {    
 Route::get('category_form',[CategoryController::class,'category_form'])->name('category.form');
Route::post('create',[CategoryController::class,'category_create'])->name('category.create');
Route::get('categories',[CategoryController::class,'index'])->name('category.index');
Route::get('view',[CategoryController::class,'category_view'])->name('category.view');
Route::get('edit/{id}',[CategoryController::class,'category_edit'])->name('category.edit');
Route::put('update/{id}',[CategoryController::class,'category_update'])->name('category.update');
Route::delete('delete/{id}',[CategoryController::class,'category_delete'])->name('category.delete');
});
});

// Jobs Related routes 
Route::prefix('job')->group(function () {
    Route::middleware('role:employer,super_admin')->group(function () {    
      Route::get('job_form',[JobController::class,'job_form'])->name('job.form');
     Route::post('create',[JobController::class,'job_create'])->name('job.create');
     Route::get('jobs',[JobController::class,'index'])->name('job.index');
     Route::get('view',[JobController::class,'job_view'])->name('job.view');
     Route::get('edit/{id}',[JobController::class,'job_edit'])->name('job.edit');
     Route::put('update/{id}',[JobController::class,'job_update'])->name('job.update');
     Route::delete('delete/{id}',[JobController::class,'job_delete'])->name('job.delete');
    });
});