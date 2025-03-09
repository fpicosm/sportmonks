<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Fixtures extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('fixtures', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $fixtureId, $query = []): ApiResponse
    {
        return $this->call("fixtures/$fixtureId", $query);
    }
}
