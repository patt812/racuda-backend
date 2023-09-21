<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_users_can_register(): void
    {
        $response = $this->post('api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            // 'password_confirmation' => 'password',
        ]);

        $this->assertDatabaseCount('users', 1);
        // NOTE: this pass when Auth::login($user); is used in the controller
        // $this->assertAuthenticated();
    }
}
