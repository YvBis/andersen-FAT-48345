<?php

namespace App\Services\Interfaces;

use App\DTOs\RegisterUserDTO;
use Laravel\Passport\PersonalAccessTokenResult;

interface RegisterUser
{
    public function create( RegisterUserDTO $registerUserDTO): PersonalAccessTokenResult;
}
