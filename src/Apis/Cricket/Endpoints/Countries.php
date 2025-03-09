<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Countries extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('countries', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $countryId, $query = []): ApiResponse
    {
        return $this->call("countries/$countryId", $query);
    }
}
