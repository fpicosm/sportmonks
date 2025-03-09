<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Teams extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('teams', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $teamId, $query = []): ApiResponse
    {
        return $this->call("teams/$teamId", $query);
    }
}
