<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Continents extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('continents', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $continentId, $query = []): ApiResponse
    {
        return $this->call("continents/$continentId", $query);
    }
}
