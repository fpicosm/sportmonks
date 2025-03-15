<?php

namespace Sportmonks\Apis\Football\Endpoints;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Leagues extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->callArray('leagues', $query);
    }

    /**
     * @param int $leagueId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $leagueId, array $query = []): object
    {
        return $this->callObject("leagues/$leagueId", $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function live(array $query = []): object
    {
        return $this->callArray('leagues/live', $query);
    }

    /**
     * @param string|Carbon $date
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byFixtureDate(string|Carbon $date, array $query = []): object
    {
        return $this->callArray("leagues/date/{$this->formatDate($date)}", $query);
    }

    /**
     * @param int $countryId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byCountry(int $countryId, array $query = []): object
    {
        return $this->callArray("leagues/countries/$countryId", $query);
    }

    /**
     * @param string $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $search, array $query = []): object
    {
        return $this->callArray("leagues/search/$search", $query);
    }

    /**
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function allByTeam(int $teamId, array $query = []): object
    {
        return $this->callArray("leagues/teams/$teamId", $query);
    }

    /**
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function currentByTeam(int $teamId, array $query = []): object
    {
        return $this->callArray("leagues/teams/$teamId/current", $query);
    }
}
