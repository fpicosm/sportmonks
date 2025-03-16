<?php

namespace Sportmonks\Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\FormulaOne\FormulaOneClient;

class Tracks extends FormulaOneClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('tracks', $query);
    }

    /**
     * @param int $trackId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $trackId, array $query = []): object
    {
        return $this->getObject("tracks/$trackId", $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->getArray("tracks/season/$seasonId", $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function winnersBySeason(int $seasonId, array $query = []): object
    {
        return $this->getArray("tracks/season/$seasonId/winners", $query);
    }
}
