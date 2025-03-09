<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Seasons extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('seasons', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("seasons/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byTeam(int $teamId, $query = []): ApiResponse
    {
        return $this->call("seasons/teams/$teamId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("seasons/search/$search", $query);
    }
}
