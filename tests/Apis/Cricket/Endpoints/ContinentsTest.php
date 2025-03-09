<?php

namespace Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class ContinentsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_continents_test(): void
    {
        $response = Sportmonks::cricket()->continents()->all();

        $this->assertEquals('/api/v2.0/continents', $response->url->getPath());
    }
}
