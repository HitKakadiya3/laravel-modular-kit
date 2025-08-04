<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Jobs\DummyJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
require base_path('app/Modules/Post/Routes/web.php');
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/dispatch-job', function () {
    DummyJob::dispatch();
    return 'Dummy job dispatched!';
});

Route::get('/dispatch-another', function () {
    \App\Jobs\AnotherJob::dispatch();
    return 'AnotherJob dispatched!';
});

Route::fallback(function () {
    return redirect('/home');
});
Route::get('/password-reset/{token}', [NewPasswordController::class, 'showResetForm'])->name('password.reset');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
