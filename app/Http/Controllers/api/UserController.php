<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\AppUserService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(
        public AppUserService $userService
    ){}
    public function register(RegisterRequest $request): JsonResponse
    {
        $registerUserDto = $request->getRegisterUserDTO();
        $token = $this->userService->createUser($registerUserDto);

        return new JsonResponse([
            'token' => $token->accessToken,
        ], Response::HTTP_CREATED);
    }
}
