<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    use ResponseTrait;

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'phone' => 'required|numeric',
            'password' => 'required',
        ]);

        if (!auth()->attempt($credentials)) {
            return $this->errorResponse('Invalid credentials. Please try again.', 401);
        }

        $user = User::where('phone', $request->phone)->firstOrFail();
        $token = $user->createToken('auth-token')->plainTextToken;

        return $this->successResponse([
            'user' => $user,
            'token' => $token,
            'type'=>'Bearer',
        ], 'Login successful.');
    }

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        $validatedData = $validator->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        $token = $user->createToken('auth-token')->plainTextToken;

        return $this->successResponse([
            'user' => $user,
            'token' => $token,
        ], 'User registered successfully!', 201);
    }

    public function logout(): JsonResponse
    {
        $user = Auth::user();

        if (!$user) {
            return $this->errorResponse('User not authenticated.', 401);
        }

        $user->tokens->each(function ($token) {
            $token->delete();
        });

        return $this->successResponse([], 'Logged out successfully.');
    }
}





