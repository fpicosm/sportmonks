<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Officials extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('officials', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $officialId, $query = []): ApiResponse
    {
        return $this->call("officials/$officialId", $query);
    }
}
