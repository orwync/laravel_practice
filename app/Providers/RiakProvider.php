<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RiakProvider extends ServiceProvider
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
        $this->app->singleton(Connection::class, function($app){
            return new Connection(config('rika'));
        });
    }
}
