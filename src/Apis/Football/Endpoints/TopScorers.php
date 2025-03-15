<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class TopScorers extends FootballClient
{
    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->callArray("topscorers/seasons/$seasonId", $query);
    }

    /**
     * @param int $stageId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byStage(int $stageId, array $query = []): object
    {
        return $this->callArray("topscorers/stages/$stageId", $query);
    }
}
