<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Scores extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('scores', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $scoreId, $query = []): ApiResponse
    {
        return $this->call("scores/$scoreId", $query);
    }
}
