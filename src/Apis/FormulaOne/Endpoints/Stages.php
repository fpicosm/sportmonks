<?php

namespace Sportmonks\Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\FormulaOne\FormulaOneApiClient;
use Sportmonks\Clients\ApiResponse;

class Stages extends FormulaOneApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('stages', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $stageId, $query = []): ApiResponse
    {
        return $this->call("stages/$stageId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("stages/season/$seasonId", $query);
    }
}
