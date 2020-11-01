<?php

namespace Reza_hdrm\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Reza_hdrm\User\Models\User;
use Reza_hdrm\User\Services\VerifyCodeService;
use Tests\TestCase;

class RegistrationTest extends TestCase
{

    use RefreshDatabase;

    public function test_user_can_see_register_form(): void {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    public function test_user_can_register(): void {
        $this->withoutExceptionHandling();
        $response = $this->registerNewUser();

        //$response->assertOk();
        $response->assertRedirect(route('home'));
        self::assertCount(1, User::all());
    }

    public function test_user_have_to_verify_account(): void {
        $this->registerNewUser();

        $response = $this->get(route('home'));

        $response->assertRedirect(route('verification.notice'));
    }

    public function testUserCanVerityAccount(): void {
        $user = User::create([
            'name' => 'reza',
            'email' => 'rezasdf@gmail.com',
            'password' => bcrypt('A!ddf44d')
        ]);

        $code = VerifyCodeService::codeGenerate();
        VerifyCodeService::store($user->id,$code,now()->addDay());
        auth()->loginUsingId($user->id);

        $this->assertAuthenticated();
        $this->post(route('verification.verify'), [
            'verify_code' => $code
        ]);


        $this->assertEquals(true, $user->fresh()->hasVerifiedEmail());
    }

    public function test_verified_user_can_see_home_page(): void {
        $this->registerNewUser();

        $this->assertAuthenticated();
        auth()->user()->markEmailAsVerified();
        $response = $this->get(route('home'));
        $response->assertOk();
    }

    public function registerNewUser(): \Illuminate\Testing\TestResponse {
        return $this->post(route('register'), [
            'name' => 'hmn',
            'email' => 'rezafff@gmial.comm',
            'mobile' => '9365122415',
            'password' => 'Aa125!333',
            'password_confirmation' => 'Aa125!333'
        ]);
    }
}
