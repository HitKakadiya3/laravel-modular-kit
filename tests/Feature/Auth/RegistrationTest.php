<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_users_can_register(): void
    {
        Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']); // ✅ Ensure role exists

        $response = $this->from('/register')->post('/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/home'); // Default redirect after registration
        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com',
        ]);
    }
}
