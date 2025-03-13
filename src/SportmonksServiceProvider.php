<?php

namespace Sportmonks;

use Illuminate\Support\ServiceProvider;

class SportmonksServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $configPath = dirname(__DIR__) . '/config';
        $configFile = $configPath . '/sportmonks.php';

        $this->publishes([
            $configFile => config_path('sportmonks.php'),
        ], 'config');

        $this->mergeConfigFrom($configFile, 'sportmonks');
    }

    public function register(): void
    {
        $this->app->singleton('sportmonks', function () {
            return new Sportmonks();
        });
    }
}
