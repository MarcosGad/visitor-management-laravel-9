<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

// https://www.webslesson.info/2022/02/visitor-management-system-project-in-laravel.html

Route::get('/', function () {
    return view('auth.login');
});

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'custom_registration'])->name('register.custom');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'custom_login'])->name('login.custom');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');