<?php
// https://www.webslesson.info/2022/02/visitor-management-system-project-in-laravel.html
// https://yajrabox.com/docs/laravel-datatables/master/installation
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubUserController;
Route::get('sub_user', [SubUserController::class, 'index'])->name('sub_user');

Route::get('sub_user/fetchall', [SubUserController::class, 'fetch_all'])->name('sub_user.fetchall');


Route::get('/', function () {
    return view('auth.login');
});

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'custom_registration'])->name('register.custom');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'custom_login'])->name('login.custom');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/edit_validation', [ProfileController::class, 'edit_validation'])->name('profile.edit_validation');

Route::get('sub_user', [SubUserController::class, 'index'])->name('sub_user');
Route::get('sub_user/fetchall', [SubUserController::class, 'fetch_all'])->name('sub_user.fetchall');

Route::get('NewCollection', function () {

    $array = [1,2,3,4,5,null,0];
    $items = \App\Domain\Support\NewCollection::make($array);

    $dd = $items->map(function ($item, $key) {
        return $item;
    })->filter()->sum();
    dd($dd);

});
