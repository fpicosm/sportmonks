<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Players extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('players', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $playerId, $query = []): ApiResponse
    {
        return $this->call("players/$playerId", $query);
    }
}
