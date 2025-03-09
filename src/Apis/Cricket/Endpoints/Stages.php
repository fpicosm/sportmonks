<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Stages extends CricketApiClient
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
}
