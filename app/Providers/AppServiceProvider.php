<?php

namespace App\Providers;

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
        // ownerから始まるURL
        if(request()->is('owner*')){
            config(['session.cookie' =>config('session.cookie_owner')]);
        } else if(request()->is('admin*')){
            config(['session.cookie' =>config('session.cookie_admin')]);
        }else{
            config(['session.cookie' => config('session.cookie')]);
        }
    }
}
