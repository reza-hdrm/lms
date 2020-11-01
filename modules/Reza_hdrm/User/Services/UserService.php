<?php


namespace Reza_hdrm\User\Services;


use Reza_hdrm\User\Models\User;
use Reza_hdrm\User\Rules\ValidMobile;
use Reza_hdrm\User\Rules\ValidPassword;

class UserService
{
    public static function changePassword(User $user, string $newPassword) {
        $user->update(['password' => bcrypt($newPassword)]);
    }

    public static function getRules(): array {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['nullable', 'string', 'min:10', 'max:14', 'unique:users', new ValidMobile()],
            'password' => self::getPasswordRule(),
        ];
    }

    public static function getPasswordRule(): array {
        return ['required', 'confirmed', 'string', new ValidPassword];
    }
}
