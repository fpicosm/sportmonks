<?php

namespace Sportmonks;

use Illuminate\Support\ServiceProvider;

class SportmonksServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $configPath = dirname(__DIR__) . '/config';

        $this->mergeConfigFrom($configPath . '/sportmonks.php', 'sportmonks');

        $this->publishes([
            $configPath . '/sportmonks.php' => config_path('sportmonks.php'),
        ], 'config');
    }

    public function register(): void
    {
        $this->app->singleton('sportmonks', function () {
            return new Sportmonks();
        });
    }
}
