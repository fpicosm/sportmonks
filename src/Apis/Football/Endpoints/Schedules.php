<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Schedules extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("schedules/seasons/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byTeam(int $teamId, $query = []): ApiResponse
    {
        return $this->call("schedules/teams/$teamId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeasonAndTeam(int $seasonId, int $teamId, $query = []): ApiResponse
    {
        return $this->call("schedules/seasons/$seasonId/teams/$teamId", $query);
    }
}
