<?php

namespace Sportmonks\Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Core\CoreApiClient;
use Sportmonks\Clients\ApiResponse;

class Types extends CoreApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('types', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $typeId, $query = []): ApiResponse
    {
        return $this->call("types/$typeId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byEntity($query = []): ApiResponse
    {
        return $this->call('types/entities', $query);
    }
}
