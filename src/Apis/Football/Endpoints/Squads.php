<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Squads extends FootballClient
{
    /**
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function currentByTeam(int $teamId, array $query = []): object
    {
        return $this->callArray("squads/teams/$teamId", $query);
    }

    /**
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function extendedByTeam(int $teamId, array $query = []): object
    {
        return $this->callArray("squads/teams/$teamId/extended", $query);
    }

    /**
     * @param int $seasonId
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeasonAndTeam(int $seasonId, int $teamId, array $query = []): object
    {
        return $this->callArray("squads/seasons/$seasonId/teams/$teamId", $query);
    }
}
