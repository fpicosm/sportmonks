<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Stages extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('stages', $query);
    }

    /**
     * @param int $stageId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $stageId, array $query = []): object
    {
        return $this->getObject("stages/$stageId", $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->getArray("stages/seasons/$seasonId", $query);
    }

    /**
     * @param string $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $search, array $query = []): object
    {
        return $this->getArray("stages/search/$search", $query);
    }
}
