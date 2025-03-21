<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Seasons extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('seasons', $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $seasonId, array $query = []): object
    {
        return $this->getObject("seasons/$seasonId", $query);
    }

    /**
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byTeam(int $teamId, array $query = []): object
    {
        return $this->getArray("seasons/teams/$teamId", $query);
    }

    /**
     * @param string|int $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string|int $search, array $query = []): object
    {
        return $this->getArray("seasons/search/$search", $query);
    }
}
