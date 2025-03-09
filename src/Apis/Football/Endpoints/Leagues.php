<?php

namespace Sportmonks\Apis\Football\Endpoints;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Leagues extends FootballApiClient
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

    /**
     * @throws GuzzleException
     */
    public function live($query = []): ApiResponse
    {
        return $this->call('leagues/live', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byFixtureDate(string|Carbon $date, $query = []): ApiResponse
    {
        return $this->call("leagues/date/{$this->formatDate($date)}", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byCountry(int $countryId, $query = []): ApiResponse
    {
        return $this->call("leagues/countries/$countryId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("leagues/search/$search", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function allByTeam(int $teamId, $query = []): ApiResponse
    {
        return $this->call("leagues/teams/$teamId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function currentByTeam(int $teamId, $query = []): ApiResponse
    {
        return $this->call("leagues/teams/$teamId/current", $query);
    }
}
