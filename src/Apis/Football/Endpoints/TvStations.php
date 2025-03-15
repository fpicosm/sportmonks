<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class TvStations extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('tv-stations', $query);
    }

    /**
     * @param int $tvStationId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $tvStationId, array $query = []): object
    {
        return $this->getObject("tv-stations/$tvStationId", $query);
    }

    /**
     * @param int $fixtureId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->getArray("tv-stations/fixtures/$fixtureId", $query);
    }
}
