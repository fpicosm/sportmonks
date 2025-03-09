<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Venues extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('venues', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $venueId, $query = []): ApiResponse
    {
        return $this->call("venues/$venueId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("venues/seasons/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("venues/search/$search", $query);
    }
}
