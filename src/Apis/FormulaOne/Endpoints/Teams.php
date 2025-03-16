<?php

namespace Sportmonks\Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\FormulaOne\FormulaOneClient;

class Teams extends FormulaOneClient
{
    /**
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $teamId, array $query = []): object
    {
        return $this->getObject("teams/$teamId", $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->getArray("teams/season/$seasonId", $query);
    }

    /**
     * @param int $teamId
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function resultsBySeason(int $teamId, int $seasonId, array $query = []): object
    {
        return $this->getObject("teams/$teamId/season/$seasonId/results", $query);
    }
}
