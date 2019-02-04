<?php

namespace App\Providers;

use App\Models\ContactApplication;
use App\Models\FreeSessionApplication;
use App\Models\PowerTransformation;
use App\Models\Story;
use App\Models\Subscriber;
use App\Observers\ContactApplicationObserver;
use App\Observers\FreeSessionApplicationObserver;
use App\Observers\PowerTransformationObserver;
use App\Observers\StoryObserver;
use App\Observers\SubscriberObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //
        $this->app['view']->addNamespace('public', base_path() . '/resources/views/public');
        $this->app['view']->addNamespace('administrator', base_path() . '/resources/views/admin');

        ContactApplication::observe(ContactApplicationObserver::class);
        FreeSessionApplication::observe(FreeSessionApplicationObserver::class);
        PowerTransformation::observe(PowerTransformationObserver::class);
        Story::observe(StoryObserver::class);
        Subscriber::observe(SubscriberObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

    }
}
