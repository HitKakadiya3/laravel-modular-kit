<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/dashboard', function () {
        $user = request()->user();
        
        if ($user->hasRole('user')) {
            return ['Laravel' => 'Welcome to User Dashboard'];
        }
        
        return response()->json(['error' => 'Unauthorized. User role required.'], 403);
    });
});

require __DIR__.'/auth.php';
