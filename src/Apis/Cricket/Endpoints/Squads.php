<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Squads extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function byTeamAndSeason(int $teamId, int $seasonId, $query = []): ApiResponse
    {
        return $this->call("teams/$teamId/squad/$seasonId", $query);
    }
}
