<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $userService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testRegister()
    {
        $data = [
            'username' => 'test',
            'password' => 'password',
        ];

        $user = $this->userService->register($data, '');

        $this->assertDatabaseHas('users', [
            'username' => $data['username'],
        ]);

        $this->assertGuest();

        $this->assertArrayHasKey('username', $user);
        $this->assertArrayHasKey('profile_image', $user);
        $this->assertArrayHasKey('role', $user);
        $this->assertArrayHasKey('created_at', $user);
        
        $this->assertEquals($data['username'], $user['username']);
    }

    public function testLogin()
    {
        $data = [
            'username' => 'test',
            'password' => 'password',
        ];

        $this->userService->register($data, '');
        $this->assertDatabaseHas('users', [
            'username' => $data['username'],
        ]);

        $user = $this->userService->login($data['username'], $data['password']);
        $this->assertAuthenticated();

        $this->assertArrayHasKey('username', $user);
        $this->assertArrayHasKey('profile_image', $user);
        $this->assertArrayHasKey('role', $user);
        $this->assertArrayHasKey('created_at', $user);
    }

    public function testLogout()
    {
        $data = [
            'username' => 'test',
            'password' => 'password',
        ];

        $this->userService->register($data, '');
        $this->assertDatabaseHas('users', [
            'username' => $data['username'],
        ]);

        $this->userService->login($data['username'], $data['password']);
        $this->assertAuthenticated();

        $this->userService->logout();
        $this->assertGuest();
    }

    public function testUpdatePassword()
    {
        $data = [
            'username' => 'test',
            'password' => 'password',
        ];

        $this->userService->register($data, '');
        $this->assertDatabaseHas('users', [
            'username' => $data['username'],
        ]);

        $this->userService->login($data['username'], $data['password']);
        $this->assertAuthenticated();

        $newData = ['password' => 'newpassword'];

        $updated_user = $this->userService->update($data['username'], $newData);
        $this->assertArrayHasKey('username', $updated_user);
        $this->assertArrayHasKey('profile_image', $updated_user);
        $this->assertArrayHasKey('role', $updated_user);
        $this->assertArrayHasKey('created_at', $updated_user);

        $this->userService->logout();
        $this->assertGuest();

        $this->userService->login($data['username'], $newData['password']);
        $this->assertAuthenticated();

    }

    public function testUpdateUsername()
    {
        $data = [
            'username' => 'test',
            'password' => 'password',
        ];

        $this->userService->register($data, '');
        $this->assertDatabaseHas('users', [
            'username' => $data['username'],
        ]);

        $this->userService->login($data['username'], $data['password']);
        $this->assertAuthenticated();

        $newData = ['username' => 'newtest'];

        $updated_user = $this->userService->update($data['username'], $newData);
        $this->assertArrayHasKey('username', $updated_user);
        $this->assertArrayHasKey('profile_image', $updated_user);
        $this->assertArrayHasKey('role', $updated_user);
        $this->assertArrayHasKey('created_at', $updated_user);
        $this->assertEquals($newData['username'], $updated_user['username']);

        $this->userService->logout();
        $this->assertGuest();

        $this->userService->login($newData['username'], $data['password']);
        $this->assertAuthenticated();
    }

    public function testSoftDelete()
    {
        $data = [
            'username' => 'test',
            'password' => 'password',
        ];

        $this->userService->register($data, '');
        $this->assertDatabaseHas('users', [
            'username' => $data['username'],
        ]);

        $this->userService->login($data['username'], $data['password']);
        $this->assertAuthenticated();

        $deleted_user = $this->userService->softDelete($data['username']);
        $this->assertDatabaseHas('users', [
            'username' => $data['username'],
            'deleted_at' => $deleted_user['deleted_at'],
        ]);

        $this->userService->logout();
        $this->assertGuest();
    }

    // public function testHardDelete()
    // {
    //     $data = [
    //         'username' => 'test',
    //         'password' => 'password',
    //     ];

    //     $this->userService->login($data['username'], $data['password']);
    //     $this->assertAuthenticated();

    //     $deleted_user = $this->userService->hardDelete($data['username']);
    //     $this->assertDatabaseMissing('users', [
    //         'username' => $data['username'],
    //     ]);
    //     $this->assertEquals($deleted_user, true);
    // }

    public function testGetUser()
    {
        $data = [
            'username' => 'test',
            'password' => 'password',
        ];

        $this->userService->register($data, '');
        $this->assertDatabaseHas('users', [
            'username' => $data['username'],
        ]);

        $this->userService->login($data['username'], $data['password']);
        $this->assertAuthenticated();

        $user = $this->userService->getUser($data['username']);
        $this->assertArrayHasKey('username', $user);
        $this->assertArrayHasKey('profile_image', $user);
        $this->assertArrayHasKey('role', $user);
        $this->assertArrayHasKey('created_at', $user);
    }

}
