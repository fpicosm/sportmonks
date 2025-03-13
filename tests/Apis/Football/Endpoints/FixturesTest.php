<?php

namespace Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class FixturesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_fixtures_test(): void
    {
        $response = Sportmonks::football()
            ->fixtures()
            ->getPage(1, 1)
            ->setInclude()
            ->all();

        dd($response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_continents_test(): void
    {
        $response = Sportmonks::core()
            ->continents()
            ->getPage(1, 1)
            ->setInclude()
            ->all();

        dd($response->data);
    }
}
