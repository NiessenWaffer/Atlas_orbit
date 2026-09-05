<?php

namespace App\Http\Controllers\Shared\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Shared\Auth\LoginRequest;

class AuthController extends Controller
{
    function login(LoginRequest $request){
        dd($request->validated());
    }
}
