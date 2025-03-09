<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Positions extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('positions', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $positionId, $query = []): ApiResponse
    {
        return $this->call("positions/$positionId", $query);
    }
}
