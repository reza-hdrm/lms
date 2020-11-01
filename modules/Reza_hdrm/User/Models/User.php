<?php

namespace Reza_hdrm\User\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Reza_hdrm\User\Mail\ResetPasswordRequestMail;
use Reza_hdrm\User\Notifications\ResetPasswordRequestNotification;
use Reza_hdrm\User\Notifications\VerifyMailNotification;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification() {
        $this->notify(new VerifyMailNotification());
    }

    public function sendRestPasswordRequestNotification() {
        $this->notify(new ResetPasswordRequestNotification());
    }
}
