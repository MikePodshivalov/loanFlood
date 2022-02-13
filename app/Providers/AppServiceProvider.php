<?php

namespace App\Providers;

use App\Contracts\Synchronizable;
use App\Models\Tag;
use App\Models\User;
use App\Services\TagsSynchronizer;
use Carbon\Carbon;
use Dadata\DadataClient;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nette\Utils\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Synchronizable::class, TagsSynchronizer::class);

        $this->app->singleton('dadata', function ($app) {
            return new DadataClient(env('DADATA_KEY'), null);
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
            $view->with('tagsCloud', Tag::tagsCloud());
        });

        view()->composer('loans.show', function ($view) {
            $view->with('listOfUserRole', User::listOfUserRole());
        });
    }
}
