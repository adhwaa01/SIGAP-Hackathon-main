<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_users_can_login_by_role(): void
    {
        $cases = [
            ['email' => 'learner@demo.com', 'password' => 'password', 'role' => 'learner', 'expected' => '/user/dashboard'],
            ['email' => 'teacher@demo.com', 'password' => 'password', 'role' => 'teacher', 'expected' => '/teacher/dashboard'],
            ['email' => 'mentor@demo.com', 'password' => 'password', 'role' => 'mentor', 'expected' => '/mentor/dashboard'],
            ['email' => 'officer@demo.com', 'password' => 'password', 'role' => 'officer', 'expected' => '/officer/dashboard'],
            ['email' => 'institution@demo.com', 'password' => 'password', 'role' => 'institution', 'expected' => '/institution/dashboard'],
            ['email' => 'admin@demo.com', 'password' => 'password', 'role' => 'admin', 'expected' => '/admin/dashboard'],
        ];

        foreach ($cases as $case) {
            User::factory()->create([
                'name' => 'Demo ' . ucfirst($case['role']),
                'email' => $case['email'],
                'password' => bcrypt($case['password']),
                'role' => $case['role'],
            ]);

            $response = $this->post('/teacher/login', [
                'email' => $case['email'],
                'password' => $case['password'],
                'role' => $case['role'],
            ]);

            $response->assertRedirect($case['expected']);
            $this->assertAuthenticated();
            $this->post('/teacher/logout')->assertRedirect('/login');
        }
    }

    public function test_shared_login_route_accepts_generic_role_login(): void
    {
        $user = User::factory()->create([
            'name' => 'Demo User',
            'email' => 'user@demo.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        $this->get('/login')->assertOk();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
            'role' => 'user',
        ])->assertRedirect('/user/dashboard');

        $this->post('/teacher/logout')->assertRedirect('/login');

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
            'role' => 'teacher',
        ])->assertSessionHasErrors('role');
    }
}
