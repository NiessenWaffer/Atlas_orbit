<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shared\Auth\AuthController;

Route::get('/api/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Backend is connected!',
    ]);
});

Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');


Route::post('/login', [AuthController::class, 'login']);