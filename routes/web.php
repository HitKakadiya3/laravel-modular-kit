<?php

use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect('/login');
// });

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/user/dashboard', function () {
//         $user = request()->user();
        
//         if ($user->hasRole('user')) {
//             return ['Laravel' => 'Welcome to User Dashboard'];
//         }
        
//         return response()->json(['error' => 'Unauthorized. User role required.'], 403);
//     });
// });

require __DIR__.'/auth.php';

Auth::routes();

Route::fallback(function () {
    return redirect('/home');
});
Route::get('/password-reset/{token}', [NewPasswordController::class, 'showResetForm'])->name('password.reset');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
