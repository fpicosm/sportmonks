<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Rounds extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->callArray('rounds', $query);
    }

    /**
     * @param int $roundId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $roundId, array $query = []): object
    {
        return $this->callObject("rounds/$roundId", $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->callArray("rounds/seasons/$seasonId", $query);
    }

    /**
     * @param string|int $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string|int $search, array $query = []): object
    {
        return $this->callArray("rounds/search/$search", $query);
    }
}
