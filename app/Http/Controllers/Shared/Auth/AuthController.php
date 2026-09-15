<?php

namespace App\Http\Controllers\Shared\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials.',
                'errors' => [
                    'email' => ['The provided credentials do not match our records.'],
                ],
            ], 422);
        }

        $request->session()->regenerate();

        return response()->json([
            'message' => 'Login successful.',
            'user' => Auth::user(),
            'csrf_token' => csrf_token(),
        ]);
    }

    public function currentUser(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
            'csrf_token' => csrf_token(),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
