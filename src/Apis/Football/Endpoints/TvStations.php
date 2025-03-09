<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class TvStations extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('tv-stations', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $tvStationId, $query = []): ApiResponse
    {
        return $this->call("tv-stations/$tvStationId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byFixture(int $fixtureId, $query = []): ApiResponse
    {
        return $this->call("tv-stations/fixtures/$fixtureId", $query);
    }
}
