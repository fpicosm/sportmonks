<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Leagues extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('leagues', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $leagueId, $query = []): ApiResponse
    {
        return $this->call("leagues/$leagueId", $query);
    }
}
