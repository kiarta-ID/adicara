<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'message' => 'Unauthorized',
                'errors' => [
                    'email' => ['The provided credentials do not match our records.'],
                ],
            ], 401);
        }

        return response()->json([
            'token' => auth()->user()->createToken('Adicara')->plainTextToken,
            'user' => auth()->user(),
        ]);
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::user()->tokens()->delete();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            auth()->logout();
            return response()->json(['message' => 'Successfully logged out']);
        }
        else {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully registered!',
        ], 201);
    }
}
