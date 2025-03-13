<?php

use Dotenv\Dotenv;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase as TestBase;
use Illuminate\Support\Facades\Config;
use Sportmonks\SportmonksServiceProvider;

class TestCase extends TestBase
{
    public function createApplication(): Application
    {
        $app = require dirname(__DIR__) . '/vendor/laravel/laravel/bootstrap/app.php';

        $app->register(SportmonksServiceProvider::class);
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->safeLoad();

        Config::set('sportmonks.per_page', env('SPORTMONKS_PER_PAGE'));
        Config::set('sportmonks.timezone', env('SPORTMONKS_TIMEZONE'));
        Config::set('sportmonks.api_token', env('SPORTMONKS_TOKEN'));
    }
}
