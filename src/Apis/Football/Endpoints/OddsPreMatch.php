<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class OddsPreMatch extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('odds/pre-match', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byFixture(int $fixtureId, $query = []): ApiResponse
    {
        return $this->call("odds/pre-match/fixtures/$fixtureId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byFixtureAndBookmaker(int $fixtureId, int $bookmakerId, $query = []): ApiResponse
    {
        return $this->call("odds/pre-match/fixtures/$fixtureId/bookmakers/$bookmakerId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byFixtureAndMarket(int $fixtureId, int $marketId, $query = []): ApiResponse
    {
        return $this->call("odds/pre-match/fixtures/$fixtureId/markets/$marketId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function latest($query = []): ApiResponse
    {
        return $this->call('odds/pre-match/latest', $query);
    }

    public function premium(): OddsPremium
    {
        return new OddsPremium();
    }
}
