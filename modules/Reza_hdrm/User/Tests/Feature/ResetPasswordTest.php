<?php

namespace Reza_hdrm\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Reza_hdrm\User\Models\User;
use Reza_hdrm\User\Services\VerifyCodeService;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{


    public function test_user_can_see_reset_password_request_form(): void {
        $this->get(route('password.request'))->assertOk();
    }

    public function test_user_can_enter_verify_code_form_correct_email(): void {
        $this->call('get', route('password.sendVerifyCodeEmail'), ['email' => 'reza@gmail.com'])
            ->assertOk();
    }

    public function test_user_cannot_enter_verify_code_form_correct_email(): void {
        $this->call('get', route('password.sendVerifyCodeEmail'), ['email' => 'rezadgmail.com'])
            ->assertRedirect();
    }

    public function test_user_banned_after_6_attempt_to_reset_password(): void {
        for ($i = 0; $i < 5; $i++)
            $this->post(route('password.checkVerifyCode'), [
                'verify_code', 'email' => 'reza@gmail.com'
            ])->assertStatus(302);
        $this->post(route('password.checkVerifyCode'), ['verify_code', 'email' => 'reza@gmail.com'])
            ->assertStatus(429);
    }
}
