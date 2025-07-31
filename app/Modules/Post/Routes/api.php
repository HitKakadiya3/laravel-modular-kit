<?php

use App\Modules\Post\Controllers\PostApiController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostApiController::class);
});