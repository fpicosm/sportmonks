<?php

namespace Sportmonks\Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\FormulaOne\FormulaOneApiClient;
use Sportmonks\Clients\ApiResponse;

class Tracks extends FormulaOneApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('tracks', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $trackId, $query = []): ApiResponse
    {
        return $this->call("tracks/$trackId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("tracks/season/$seasonId", $query);
    }
}
