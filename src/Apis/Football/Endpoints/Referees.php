<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Referees extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->callArray('referees', $query);
    }

    /**
     * @param int $refereeId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $refereeId, array $query = []): object
    {
        return $this->callObject("referees/$refereeId", $query);
    }

    /**
     * @param int $countryId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byCountry(int $countryId, array $query = []): object
    {
        return $this->callArray("referees/countries/$countryId", $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->callArray("referees/seasons/$seasonId", $query);
    }

    /**
     * @param string $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $search, array $query = []): object
    {
        return $this->callArray("referees/search/$search", $query);
    }
}
