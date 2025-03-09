<?php

namespace Sportmonks\Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\FormulaOne\FormulaOneApiClient;
use Sportmonks\Clients\ApiResponse;

class Drivers extends FormulaOneApiClient
{
    /**
     * @throws GuzzleException
     */
    public function find(int $driverId, $query = []): ApiResponse
    {
        return $this->call("drivers/$driverId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("drivers/season/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function seasonResults(int $driverId, int $seasonId, $query = []): ApiResponse
    {
        return $this->call("drivers/$driverId/season/$seasonId/results", $query);
    }
}
