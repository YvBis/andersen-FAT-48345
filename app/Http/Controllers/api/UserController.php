<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\RegisterUserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function register(RegisterRequest $request, RegisterUserService $registerUser): JsonResponse
    {
        $registerUserDto = $request->getRegisterUserDTO();
        $token = $registerUser->create($registerUserDto);

        return new JsonResponse([
            'token' => $token->accessToken,
        ],201);
    }

    public function test()
    {
        return new JsonResponse([
            'message' => 'ok'
        ], 200);
    }
}
