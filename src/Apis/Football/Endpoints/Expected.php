<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Expected extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function byTeam($query = []): ApiResponse
    {
        return $this->call('expected/fixtures', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byPlayer($query = []): ApiResponse
    {
        return $this->call('expected/lineups', $query);
    }
}
