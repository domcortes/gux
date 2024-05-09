<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|max:255|unique:users',
                'name' => 'required|max:255',
                'password' => 'required|min:6|confirmed',
                'country' => 'required'
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country_id' => $request->country
        ]);

        $jwtToken = JWTAuth::fromUser($user);

        return response()->json([
            'user' => $user,
            'token' => $jwtToken
        ], 201);
    }

    public function login(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(
                    [
                        'error' => 'Credenciales invalidas'
                    ],
                    400
                );
            }
        } catch (JWTException $th) {
            return response()->json([
                'error' => 'Token no asignado a usuario'
            ], 500);
        }

        return response()->json(compact('token'));
    }
}
