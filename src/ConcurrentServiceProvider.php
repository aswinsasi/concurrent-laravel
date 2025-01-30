<?php

namespace Vendor\ConcurrentLaravel;

use Illuminate\Support\ServiceProvider;

class ConcurrentServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Bind the ConcurrentExecutor class to the service container..
        $this->app->singleton('concurrent', function ($app) {
            
            return new ConcurrentExecutor();
        });
    }

    public function boot()
    {
        // Add any bootstrapping logic if needed
    }
}
