<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class TopScorers extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("topscorers/seasons/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byStage(int $stageId, $query = []): ApiResponse
    {
        return $this->call("topscorers/stages/$stageId", $query);
    }
}
