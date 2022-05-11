<?php

namespace Yarm\Genre;

use Illuminate\Support\ServiceProvider;

class GenreServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/genre.php' => config_path('genre.php'),
        ]);
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','genre');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->mergeConfigFrom(__DIR__.'/config/genre.php','genre');
    }

    public function register()
    {

    }

}

