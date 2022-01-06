<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\App\Contracts\Synchronizable::class, \App\Services\TagsSynchronizer::class);

        $this->app->singleton('dadata', function ($app) {
            return new \Dadata\DadataClient(env('DADATA_KEY'), null);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view) {
            $view->with('tagsCloud', \App\Models\Tag::tagsCloud());
        });
    }
}
