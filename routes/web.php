<?php

use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
require base_path('app/Modules/Post/Routes/web.php');
require __DIR__.'/auth.php';

Auth::routes();

Route::fallback(function () {
    return redirect('/home');
});
Route::get('/password-reset/{token}', [NewPasswordController::class, 'showResetForm'])->name('password.reset');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
