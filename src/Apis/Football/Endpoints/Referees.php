<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Referees extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('referees', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $refereeId, $query = []): ApiResponse
    {
        return $this->call("referees/$refereeId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byCountry(int $countryId, $query = []): ApiResponse
    {
        return $this->call("referees/countries/$countryId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("referees/seasons/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("referees/search/$search", $query);
    }
}
