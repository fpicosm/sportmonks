<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class Standings extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("standings/season/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byStage(int $stageId, $query = []): ApiResponse
    {
        return $this->call("standings/stage/$stageId", $query);
    }
}
