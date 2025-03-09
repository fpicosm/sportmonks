<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Stages extends FootballApiClient
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
        return $this->call("stages/seasons/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("stages/search/$search", $query);
    }
}
