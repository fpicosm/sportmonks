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

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function valueBets(array $query = []): object
    {
        return $this->call('predictions/value-bets', $query, []);
    }

    /**
     * @param int $fixtureId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function valueBetsByFixture(int $fixtureId, array $query = []): object
    {
        return $this->call("predictions/value-bets/fixtures/$fixtureId", $query, []);
    }
}
