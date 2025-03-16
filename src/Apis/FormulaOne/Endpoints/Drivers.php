<?php

namespace Sportmonks\Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\FormulaOne\FormulaOneClient;

class Drivers extends FormulaOneClient
{
    /**
     * @param int $driverId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $driverId, array $query = []): object
    {
        return $this->getObject("drivers/$driverId", $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->getArray("drivers/season/$seasonId", $query);
    }

    /**
     * @param int $driverId
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function resultsBySeason(int $driverId, int $seasonId, array $query = []): object
    {
        return $this->getObject("drivers/$driverId/season/$seasonId/results", $query);
    }
}
