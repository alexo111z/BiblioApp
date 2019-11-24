<?php

namespace App\Providers;

use App\Http\Controllers\Auth\CustomGuard;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->app->bind('App\User', function () {
            return new User();
        });

        Auth::provider('biblioAuth', function ($app, array $config) {
            return new BiblioAppAuthProvider($app->make('App\User'));
        });

        Auth::extend('biblioAuthGuard', function ($app, $name, array $config) {
            return new CustomGuard(
                Auth::createUserProvider($config['provider']),
                $app->make('request')
            );
        });
    }
}
