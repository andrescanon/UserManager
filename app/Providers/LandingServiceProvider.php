<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LandingServiceProvider extends ServiceProvider
{
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //$this->loadViewsFrom('template::landing', 'landing');
        //User::observe(UserObserver::class);
    }

}
