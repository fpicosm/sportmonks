<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Standings extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('standings', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("standings/seasons/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function correctionBySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("standings/corrections/seasons/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byRound(int $roundId, $query = []): ApiResponse
    {
        return $this->call("standings/rounds/$roundId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function liveByLeague(int $leagueId, $query = []): ApiResponse
    {
        return $this->call("standings/live/leagues/$leagueId", $query);
    }
}
