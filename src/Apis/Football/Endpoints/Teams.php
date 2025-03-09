<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Teams extends FootballApiClient
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

    /**
     * @throws GuzzleException
     */
    public function byCountry(int $countryId, $query = []): ApiResponse
    {
        return $this->call("teams/countries/$countryId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("teams/seasons/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("teams/search/$search", $query);
    }
}
