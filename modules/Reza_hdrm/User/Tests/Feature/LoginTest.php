<?php

namespace Reza_hdrm\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Reza_hdrm\User\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use WithFaker;
    public function test_user_can_login_by_email(): void {
        $user = User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => bcrypt('A!d458d'),
        ]);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'A!d458d'
        ]);

        $this->assertAuthenticated();
    }

    public function test_user_can_login_by_mobile(): void {
        $user = User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'mobile' => '9391234585',
            'password' => bcrypt('A!d458d'),
        ]);

        $this->post(route('login'), [
            'email' => '9391234585',
            'password' => 'A!d458d'
        ]);

        $this->assertAuthenticated();
    }
}
