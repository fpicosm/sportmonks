<?php

namespace Sportmonks\Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\FormulaOne\FormulaOneApiClient;
use Sportmonks\Clients\ApiResponse;

class Teams extends FormulaOneApiClient
{
    /**
     * @throws GuzzleException
     */
    public function find(int $teamId, $query = []): ApiResponse
    {
        return $this->call("teams/$teamId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("teams/season/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function seasonResults(int $teamId, int $seasonId, $query = []): ApiResponse
    {
        return $this->call("teams/$teamId/season/$seasonId/results", $query);
    }
}
