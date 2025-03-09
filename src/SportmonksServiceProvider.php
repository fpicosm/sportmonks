<?php

namespace Sportmonks;

use Illuminate\Support\ServiceProvider;

class SportmonksServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/sportmonks.php' => config_path('sportmonks.php'),
        ], 'sportmonks-config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/sportmonks.php',
            'sportmonks'
        );

        $this->app->singleton('sportmonks', function () {
            return new Sportmonks();
        });
    }
}
