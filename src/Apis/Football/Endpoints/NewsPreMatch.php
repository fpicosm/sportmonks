<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class NewsPreMatch extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('news/pre-match', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("news/pre-match/seasons/$seasonId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function forUpcomingFixtures($query = []): ApiResponse
    {
        return $this->call('news/pre-match/upcoming', $query);
    }
}
