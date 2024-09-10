<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.signin_form');
});

Route::prefix('dashboard')->group(function () {

route::get('home',[DashboardController::class,'home'])->name('dashboard.home');


});



Route::prefix('auth')->group(function () {

Route::view('signup_options','pages.auth.signup_options')->name('signup.options');
Route::get('signup_as_candidate_form',[AuthController::class,'candidate_form'])->name('signup.as_candidate');
Route::get('signup_as_employer_form',[AuthController::class,'employer_form'])->name('signup.as_employer');
Route::post('employer_signup',[AuthController::class,'employer_signup'])->name('signup.employer');
Route::post('candidate_signup',[AuthController::class,'candidate_sigup'])->name('signup.candidate');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
