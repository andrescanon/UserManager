<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->getProviders() as $provider) {
            $this->app->register($provider);
        }

        Relation::morphMap([
            'user' => 'App\User'
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


    private function getProviders()
    {
        return [
            LandingServiceProvider::class,
            UsersServiceProvider::class,
            TemplateServiceProvider::class
        ];
    }
}
