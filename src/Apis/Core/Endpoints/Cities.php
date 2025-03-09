<?php

namespace Sportmonks\Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Core\CoreApiClient;
use Sportmonks\Clients\ApiResponse;

class Cities extends CoreApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('cities', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $cityId, $query = []): ApiResponse
    {
        return $this->call("cities/$cityId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("cities/search/$search", $query);
    }
}
