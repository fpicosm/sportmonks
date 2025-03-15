<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Commentaries extends FootballClient
{
    const array fields = [
        'id',
        'fixture_id',
        'comment',
        'minute',
        'extra_minute',
        'is_goal',
        'is_important',
        'order',
    ];

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->call('commentaries', $query, []);
    }

    /**
     * @param int $fixtureId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->call("commentaries/fixtures/$fixtureId", $query, []);
    }
}
