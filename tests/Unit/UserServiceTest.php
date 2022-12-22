<?php

namespace Tests\Unit;

use App\DTOs\RegisterUserDTO;
use App\Services\AppUserService;
use App\Services\Interfaces\UserService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    private UserService $userService;
    public function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
        $this->artisan('passport:install');
    }

    public function testUserCreation(): void
    {
        $stubDto = new RegisterUserDTO();
        $stubDto->setEmail('example@example.com');
        $stubDto->setPassword('123456');
        $token = $this->userService->createUser($stubDto);

        $this->assertInstanceOf(PersonalAccessTokenResult::class, $token);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users',[
                'email' => 'example@example.com',
            ]);
    }
}
