<?php

namespace Sportmonks\Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Core\CoreApiClient;
use Sportmonks\Clients\ApiResponse;

class Countries extends CoreApiClient
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

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("countries/search/$search", $query);
    }
}
