<?php

namespace Reza_hdrm\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Reza_hdrm\User\Http\Requests\ResetPasswordVerifyCodeRequest;
use Reza_hdrm\User\Http\Requests\SendResetPasswordVerifyCodeRequest;
use Reza_hdrm\User\Models\User;
use Reza_hdrm\User\Repositories\UserRepository;
use Reza_hdrm\User\Services\VerifyCodeService;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function showVerifyRequestForm() {
        return view('User::Front.passwords.email');
    }

    public function sendVerifyCodeEmail(SendResetPasswordVerifyCodeRequest $request) {

        $user = resolve(UserRepository::class)->findByEmail($request->email);

        if ($user instanceof User and !VerifyCodeService::has($user->id)) {
            $user->sendRestPasswordRequestNotification();
        }

        return view('User::Front.passwords.enter-verify-code-form',['userId'=>$user->id]);
    }

    public function checkVerifyCode(ResetPasswordVerifyCodeRequest $request) {

        $user = resolve(UserRepository::class)->findByEmail($request->email);

        if (is_null($user) or !VerifyCodeService::check($user->id, $request->verify_code))
            return back()->withErrors(['verify_code' => 'کد وارد شده معتبر نمی‌باشد!']);

        auth()->loginUsingId($user->id);

        return redirect()->route('password.showResetForm');
    }

    public function resend(Request $request) {

        //todo سرچ خطی براسای ایمیل جالب نیست
        $user=User::where("email",$request->get('email'))->first()->sendRestPasswordRequestNotification();
        return back();
    }
}
