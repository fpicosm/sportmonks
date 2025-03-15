<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class ValueBets extends FootballClient
{
    const array fields = [
        'id',
        'fixture_id',
        'predictions',
        'type_id',
    ];

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->call('predictions/value-bets', $query, []);
    }

    /**
     * @param int $fixtureId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->call("predictions/value-bets/fixtures/$fixtureId", $query, []);
    }
}
