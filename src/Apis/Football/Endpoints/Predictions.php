<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Predictions extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function probabilities($query = []): ApiResponse
    {
        return $this->call('predictions/probabilities', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byLeague(int $leagueId, $query = []): ApiResponse
    {
        return $this->call("predictions/predictability/leagues/$leagueId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byFixture(int $fixtureId, $query = []): ApiResponse
    {
        return $this->call("predictions/probabilities/fixtures/$fixtureId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function valueBets($query = []): ApiResponse
    {
        return $this->call('predictions/value-bets', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function valueBetsByFixture(int $fixtureId, $query = []): ApiResponse
    {
        return $this->call("predictions/value-bets/fixtures/$fixtureId", $query);
    }
}
