<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Coaches extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('coaches', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $coachId, $query = []): ApiResponse
    {
        return $this->call("coaches/$coachId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byCountry(int $countryId, $query = []): ApiResponse
    {
        return $this->call("coaches/countries/$countryId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("coaches/search/$search", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function latest($query = []): ApiResponse
    {
        return $this->call('coaches/latest', $query);
    }
}
