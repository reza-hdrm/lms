<?php


namespace Reza_hdrm\User\Providers;


use Illuminate\Support\ServiceProvider;
use Reza_hdrm\User\Models\User;

class UserServiceProvider extends ServiceProvider
{
    public function register() {
        config()->set('auth.providers.users.model', User::class);
    }

    public function boot() {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/user_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../DataBase/Migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../DataBase/Factories');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views','User');
    }
}
