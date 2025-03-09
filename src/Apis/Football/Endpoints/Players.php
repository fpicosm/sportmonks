<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Players extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('players', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $playerId, $query = []): ApiResponse
    {
        return $this->call("players/$playerId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byCountry(int $countryId, $query = []): ApiResponse
    {
        return $this->call("players/countries/$countryId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("players/search/$search", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function latest($query = []): ApiResponse
    {
        return $this->call('players/latest', $query);
    }
}
