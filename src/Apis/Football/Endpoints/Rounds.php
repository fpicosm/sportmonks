<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Rounds extends FootballClient
{
    const array fields = [
        'id',
        'sport_id',
        'league_id',
        'season_id',
        'group_id',
        'name',
        'finished',
        'pending',
        'is_current',
        'starting_at',
        'ending_at',
    ];

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->call('rounds', $query, []);
    }

    /**
     * @param int $roundId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $roundId, array $query = []): object
    {
        return $this->call("rounds/$roundId", $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->call("rounds/seasons/$seasonId", $query, []);
    }

    /**
     * @param string|int $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string|int $search, array $query = []): object
    {
        return $this->call("rounds/search/$search", $query, []);
    }
}
