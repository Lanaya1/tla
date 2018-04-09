<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Services
        $this->app->bind('anime.service', function () {
            return new \App\Services\AnimeService();
        });

        // Managers
        $this->app->bind('animes.manager', function () {
            return new \App\Repositories\AnimesManager();
        });
        $this->app->bind('episodes.manager', function () {
            return new \App\Repositories\EpisodesManager();
        });
    }
}
