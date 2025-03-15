<?php

use Dotenv\Dotenv;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase as TestBase;
use Illuminate\Support\Collection;
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

    protected function getQuery($response, string $key)
    {
        /** @var Collection $query */
        $query = str(urldecode($response->url->getQuery()))
            ->explode('&')
            ->mapWithKeys(function ($item) {
                [$key, $value] = str($item)->explode('=');
                return [$key => $value];
            });

        return $query->get($key);
    }

    protected function assertSchemaEquals(array $schema, object $model): void
    {
        $this->assertCount(count($schema), get_object_vars($model));
        foreach ($schema as $key) {
            $this->assertObjectHasProperty($key, $model);
        }
    }
}
