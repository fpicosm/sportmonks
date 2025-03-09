<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class States extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('states', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $stateId, $query = []): ApiResponse
    {
        return $this->call("states/$stateId", $query);
    }
}
