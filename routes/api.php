<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\atlas\requirements\StudentRequirementController;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Backend is connected!',
    ]);
});


Route::get('/getData', [StudentRequirementController::class, 'index']);