<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Predictions extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->call('predictions/probabilities', $query, []);
    }

    /**
     * @param int $leagueId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byLeague(int $leagueId, array $query = []): object
    {
        return $this->call("predictions/predictability/leagues/$leagueId", $query, []);
    }

    /**
     * @param int $fixtureId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->call("predictions/probabilities/fixtures/$fixtureId", $query, []);
    }

    public function valueBets(): ValueBets
    {
        return new ValueBets();
    }
}
