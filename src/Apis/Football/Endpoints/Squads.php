<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Squads extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function currentByTeam(int $teamId, $query = []): ApiResponse
    {
        return $this->call("squads/teams/$teamId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function extendedByTeam(int $teamId, $query = []): ApiResponse
    {
        return $this->call("squads/teams/$teamId/extended", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeasonAndTeam(int $seasonId, int $teamId, $query = []): ApiResponse
    {
        return $this->call("squads/seasons/$seasonId/teams/$teamId", $query);
    }
}
