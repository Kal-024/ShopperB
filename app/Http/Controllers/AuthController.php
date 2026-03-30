<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        $validator =Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:20|in:admin,user',
            'email' => 'required|string|email|min:10|max:100|unique:users',
            'password' => 'required|string|min:8|max:50|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        User::create([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }

            return response()->json(['token' => $token], 200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token', $e], 500);
        }
    }

    public function getUser()
    {
        $user = Auth::user();
        return response()->json($user, 200);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
