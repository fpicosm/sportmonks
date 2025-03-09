<?php

namespace Sportmonks\Apis\Odds\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Odds\OddsApiClient;
use Sportmonks\Clients\ApiResponse;

class Bookmakers extends OddsApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('bookmakers', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function premium($query = []): ApiResponse
    {
        return $this->call('bookmakers/premium', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $bookmakerId, $query = []): ApiResponse
    {
        return $this->call("bookmakers/$bookmakerId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("bookmakers/search/$search", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byFixture(int $fixtureId, $query = []): ApiResponse
    {
        return $this->call("bookmakers/fixtures/$fixtureId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function eventsByFixture(int $fixtureId, $query = []): ApiResponse
    {
        return $this->call("bookmakers/fixtures/$fixtureId/mapping", $query);
    }
}
