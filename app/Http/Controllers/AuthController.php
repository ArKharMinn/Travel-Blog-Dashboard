<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function logout(Request $request)
    {
        $data = $this->service->logout($request);
        return response()->json([
            'message' => $data['message']
        ], 200);
    }

    public function login(LoginRequest $request)
    {
        try {
            $data = $this->service->login($request);

            return response()->json([
                'message' => 'Login successful',
                'user' => $data['user'],
                'token' => $data['token'],
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Login failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function register(AuthRequest $request)
    {
        try {
            $data = $this->service->register($request);

            return response()->json([
                'message' => 'Register successful',
                'user' => $data['user'],
                'token' => $data['token'],
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Register failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
