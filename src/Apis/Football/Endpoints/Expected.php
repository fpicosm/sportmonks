<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Expected extends FootballClient
{
    const array fields = [
        'id',
        'fixture_id',
        'type_id',
        'value',
    ];

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byTeam(array $query = []): object
    {
        return $this->call('expected/fixtures', $query, []);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byPlayer(array $query = []): object
    {
        return $this->call('expected/lineups', $query, []);
    }
}
