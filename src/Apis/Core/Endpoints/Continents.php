<?php

namespace Sportmonks\Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Core\CoreApiClient;
use Sportmonks\Clients\ApiResponse;

class Continents extends CoreApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('continents', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $continentId, $query = []): ApiResponse
    {
        return $this->call("continents/$continentId", $query);
    }
}
