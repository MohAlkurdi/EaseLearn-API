<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        // Create the token
        $token = $user->createToken('API_TOKEN')->plainTextToken;

        // Return the response
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        // Validate the request
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check the email
        $user = User::where('email', $fields['email'])->first();

        // Check the password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong credentials',
            ], 401);
        }

        // Create the token
        $token = $user->createToken('API_TOKEN')->plainTextToken;

        // Return the response
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        // Revoke the token
        $request->user()->currentAccessToken()->delete();

        // Return the response
        $response = [
            'message' => 'Logged out',
        ];

        return response($response, 200);
    }
}
