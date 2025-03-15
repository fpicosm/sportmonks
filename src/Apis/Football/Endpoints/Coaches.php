<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Coaches extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('coaches', $query);
    }

    /**
     * @param int $coachId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $coachId, array $query = []): object
    {
        return $this->getObject("coaches/$coachId", $query);
    }

    /**
     * @param int $countryId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byCountry(int $countryId, array $query = []): object
    {
        return $this->getArray("coaches/countries/$countryId", $query);
    }

    /**
     * @param string $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $search, array $query = []): object
    {
        return $this->getArray("coaches/search/$search", $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function lastUpdated(array $query = []): object
    {
        return $this->getArray('coaches/latest', $query);
    }
}
