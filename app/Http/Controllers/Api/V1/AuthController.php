<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(StoreRequest $request)
    {
        $data = $request->validated();

        return User::firstOrCreate($data);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json(['message' => 'Wrong email or password'], 401);
        }
        $user = Auth::user();

        $user->tokens()->delete();

        return response()->json(
            ['user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ], '
        token' => $user->createToken("Token of user: {$user->name}")->plainTextToken]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
