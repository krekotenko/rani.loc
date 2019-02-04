<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PageCheckServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('pageCheck', 'App\Services\Pages\PageCheck' );
    }
}
