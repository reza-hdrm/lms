<?php


namespace Reza_hdrm\User\Repositories;


use Reza_hdrm\User\Models\User;

class UserRepository
{
    public function findByEmail(string $email) {
        return User::query()->where('email',$email)->first();
    }
}