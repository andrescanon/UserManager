<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TemplateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(resource_path('views/components/bootstrap'), 'bootstrap');
        $this->loadViewsFrom(resource_path('views/template/inspinia'), 'template');
    }
}
