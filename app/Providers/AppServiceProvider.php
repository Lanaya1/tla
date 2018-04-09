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
        $this->app->bind('episode.service', function () {
            return new \App\Services\EpisodeService();
        });

        // Managers
        $this->app->bind('anime.manager', function () {
            return new \App\Repositories\AnimeManager();
        });
        $this->app->bind('episode.manager', function () {
            return new \App\Repositories\EpisodeManager();
        });
    }
}
