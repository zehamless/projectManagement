<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('Allowed', function ($role){
            $session = Session::get('role');
            $roles = explode(',', $role);
            if (in_array($session, $roles) && Auth::check() && Auth::user()->hasroles->contains('name', $session)) {
                return true;
            } else {
                return false;
            }
        });
    }
}
