<?php

Route::group(['namespace' => 'Reza_hdrm\User\Http\Controllers\Auth', 'middleware' => 'web'], function ($routes) {

    /**
     * @Register
     */
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'RegisterController@register')->name('register');

    /**
     * @Verification
     */
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
    Route::post('/email/verify', 'VerificationController@verify')->name('verification.verify');
    Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');

    /**
     * @Login
     */
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/login', 'LoginController@showLoginForm')->name('login');

    /**
     * @Logout
     */
    Route::get('/logout', 'LoginController@logout')->name('logout');

    /**
     * @Reset_password
     */
    Route::get('/password/reset', 'ForgotPasswordController@showVerifyRequestForm')
        ->name('password.request');

    Route::get('/password/reset/sent', 'ForgotPasswordController@sendVerifyCodeEmail')
        ->name('password.sendVerifyCodeEmail');

    Route::post('/password/reset/check-verify-code', 'ForgotPasswordController@checkVerifyCode')
        ->name('password.checkVerifyCode')->middleware('throttle:5,1');

    Route::post('/password/reset/resent/', 'ForgotPasswordController@resend')
        ->name('password.resend');

    Route::get('/password/change', 'ResetPasswordController@showResetForm')
        ->name('password.showResetForm')->middleware('auth');

    Route::post('/password/change', 'ResetPasswordController@reset')
        ->name('password.update');
});

