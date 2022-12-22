<?php

namespace App\Services;

use App\DTOs\RegisterUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;

class AppUserService implements Interfaces\UserService
{

    public function createUser(RegisterUserDTO $registerUserDTO): PersonalAccessTokenResult
    {
        $user = new User();
        $user->email = $registerUserDTO->getEmail();
        $user->password = Hash::make($registerUserDTO->getPassword());
        $user->save();

        return $user->createToken('access token');
    }
}
