<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-connection', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Laravel API connection is working.',
    ]);
});
