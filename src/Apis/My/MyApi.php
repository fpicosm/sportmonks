<?php

namespace Sportmonks\Apis\My;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Clients\ApiResponse;
use Sportmonks\Clients\SportmonksV3Client;

class MyApi extends SportmonksV3Client
{
    public function __construct()
    {
        parent::__construct('https://api.sportmonks.com/v3/my/');
    }

    /**
     * @throws GuzzleException
     */
    public function enrichments($query = []): ApiResponse
    {
        return $this->call('enrichments', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function filters($query = []): ApiResponse
    {
        return $this->call('filters/entity', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function resources($query = []): ApiResponse
    {
        return $this->call('resources', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function leagues($query = []): ApiResponse
    {
        return $this->call('leagues', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function usage($query = []): ApiResponse
    {
        return $this->call('usage', $query);
    }
}
