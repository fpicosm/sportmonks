<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Seasons extends CricketApiClient
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
