<?php

namespace Sportmonks\Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\FormulaOne\FormulaOneApiClient;
use Sportmonks\Clients\ApiResponse;

class Seasons extends FormulaOneApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('seasons', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("seasons/$seasonId", $query);
    }
}
