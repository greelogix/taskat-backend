<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
{
    $credentials = $request->validate([
        'phone' => 'required|numeric',
        'password' => 'required',
    ]);

    if (!auth()->attempt(['phone' => $request->phone, 'password' => $request->password])) {
        return response()->json([
            'message' => 'Invalid credentials. Please try again.',
        ], 401);
    }

    $user = User::where('phone', $request->phone)->firstOrFail();
    $token = $user->createToken('auth-token');

    return response()->json([
        'message' => 'Login successful.',
        'data' => $user,
        'token' => $token->plainTextToken,
    ], 200);
}


public function register(Request $request): JsonResponse
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'phone' => 'required|numeric|unique:users,phone',
        'password' => 'required|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    $validatedData = $validator->validated();
    $validatedData['password'] = Hash::make($validatedData['password']);

    $user = User::create($validatedData);
    $token = $user->createToken('auth-token')->plainTextToken;

    return response()->json([
        'message' => 'User registered successfully!',
        'user' => $user,
        'token' => $token,
    ], 201);
}


    public function logout(): JsonResponse
{
    $user = Auth::user();

    if (!$user) {
        return response()->json([
            'error' => 'User not authenticated.',
        ], 401);
    }

    $user->tokens->each(function ($token) {
        $token->delete();
    });

    return response()->json([
        'message' => 'Logged out successfully.',
    ], 200);
}

}
