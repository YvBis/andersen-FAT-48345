<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('passport:install');
    }

    public function testUserRegistration(): void
    {
        $userData = [
            'email' => 'one@example.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ];

        $response = $this->postJson('http://localhost/api/users', $userData);
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonStructure([
            'token',
        ]);
    }

    public function testWrongEmailValidations():void
    {
        $userData = [
            'email' => 'onecom',
            'password' => '123456',
            'password_confirmation' => '123456',
        ];

        $response = $this->postJson('http://localhost/api/users', $userData);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrorFor('email');
    }

    public function testNotMatchingPasswordValidation(): void
    {
        $userData = [
            'email' => 'one@example.com',
            'password' => '123456',
            'password_confirmation' => '126',
        ];
        $response = $this->postJson('http://localhost/api/users', $userData);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrorFor('password');

    }

    public function testDuplicateEmailValidation(): void
    {
        $userData = [
            'email' => 'one@example.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ];

        $response = $this->postJson('http://localhost/api/users', $userData);
        $response->assertStatus(Response::HTTP_CREATED);

        $secondResponse = $this->postJson('http://localhost/api/users', $userData);
        $secondResponse->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $secondResponse->assertJsonValidationErrorFor('email');
    }
}
