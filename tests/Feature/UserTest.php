<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_true()
    {
        $this->assertTrue(true);
    }
    
    // public function test_user_register()
    // {
    //     $response = $this->post('/register', [
    //         'register_name' => 'John Doe',
    //         'register_email' => 'john.doe@gmail.com',
    //         'register_password' => 'password',
    //     ]);

    //     $response->assertStatus(302);
    //     $response->assertRedirect('/');

    //     $this->assertDatabaseHas('users', [
    //         'name' => 'John Doe',
    //         'email' => 'john.doe@gmail.com',
    //     ]);
    // }

    // public function test_user_login()
    // {
    //     $response = $this->post('/login', [
    //         'login_email' => 'john.doe@gmail.com',
    //         'login_password' => 'password',
    //     ]);

    //     $response->assertStatus(302);
    //     $response->assertRedirect('/');
    // }
}
