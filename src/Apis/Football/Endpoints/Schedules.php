<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Schedules extends FootballClient
{
    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->callArray("schedules/seasons/$seasonId", $query);
    }

    /**
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byTeam(int $teamId, array $query = []): object
    {
        return $this->callArray("schedules/teams/$teamId", $query);
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
        return $this->callArray("schedules/seasons/$seasonId/teams/$teamId", $query);
    }
}
