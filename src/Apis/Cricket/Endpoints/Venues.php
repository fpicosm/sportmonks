<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Venues extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('venues', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $venueId, $query = []): ApiResponse
    {
        return $this->call("venues/$venueId", $query);
    }
}
