<?php

namespace Sportmonks\Apis\Football\Endpoints;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class OddsPremium extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('odds/premium', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byFixture(int $fixtureId, $query = []): ApiResponse
    {
        return $this->call("odds/premium/fixtures/$fixtureId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byFixtureAndBookmaker(int $fixtureId, int $bookmakerId, $query = []): ApiResponse
    {
        return $this->call("odds/premium/fixtures/$fixtureId/bookmakers/$bookmakerId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byFixtureAndMarket(int $fixtureId, int $marketId, $query = []): ApiResponse
    {
        return $this->call("odds/premium/fixtures/$fixtureId/markets/$marketId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function updatedBetweenTime(int|Carbon $start, int|Carbon $end, $query = []): ApiResponse
    {
        return $this->call("odds/premium/updated/between/{$this->timestamp($start)}/{$this->timestamp($end)}", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function historical($query = []): ApiResponse
    {
        return $this->call('odds/premium/history', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function historicalUpdatedBetweenTime(int|Carbon $start, int|Carbon $end, $query = []): ApiResponse
    {
        return $this->call("odds/premium/history/updated/between/{$this->timestamp($start)}/{$this->timestamp($end)}", $query);
    }
}
