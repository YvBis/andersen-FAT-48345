<?php

namespace App\Services\Interfaces;

use App\DTOs\RegisterUserDTO;
use Laravel\Passport\PersonalAccessTokenResult;

interface UserService
{
    public function createUser(RegisterUserDTO $registerUserDTO): PersonalAccessTokenResult;
}
