<?php

namespace Sportmonks\Apis\Odds\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Odds\OddsApiClient;
use Sportmonks\Clients\ApiResponse;

class Markets extends OddsApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('markets', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function premium($query = []): ApiResponse
    {
        return $this->call('markets/premium', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $marketId, $query = []): ApiResponse
    {
        return $this->call("markets/$marketId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("markets/search/$search", $query);
    }
}
