<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Rivals extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('rivals', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byTeam(int $teamId, $query = []): ApiResponse
    {
        return $this->call("teams/rivals/$teamId", $query);
    }
}
