<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shared\Auth\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/current-user', [AuthController::class, 'currentUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('atlas_orbit')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth')->group(function () {
        Route::get('/current-user', [AuthController::class, 'currentUser']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::get('/api/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Backend is connected!',
    ]);
});

Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');
