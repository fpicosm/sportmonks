<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketApiClient;
use Sportmonks\Clients\ApiResponse;

class TeamRankings extends CricketApiClient
{
    /**
     * @throws GuzzleException
     */
    public function global($query = []): ApiResponse
    {
        return $this->call('team-rankings', $query);
    }
}
