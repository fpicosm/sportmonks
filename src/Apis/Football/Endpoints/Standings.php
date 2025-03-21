<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Standings extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('standings', $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->getArray("standings/seasons/$seasonId", $query);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function correctionBySeason(int $seasonId, array $query = []): object
    {
        return $this->getArray("standings/corrections/seasons/$seasonId", $query);
    }

    /**
     * @param int $roundId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byRound(int $roundId, array $query = []): object
    {
        return $this->getArray("standings/rounds/$roundId", $query);
    }

    /**
     * @param int $leagueId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function liveByLeague(int $leagueId, array $query = []): object
    {
        return $this->getArray("standings/live/leagues/$leagueId", $query);
    }
}
