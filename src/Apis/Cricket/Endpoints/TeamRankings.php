<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class TeamRankings extends CricketClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function global(array $query = []): object
    {
        return $this->getArray('team-rankings', $query);
    }

    /**
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $teamId, array $query = []): object
    {
        return $this->getObject("teams/$teamId", $query);
    }

    /**
     * @param int $teamId
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function squadBySeason(int $teamId, int $seasonId, array $query = []): object
    {
        return $this->getObject("teams/$teamId/squad/$seasonId", $query);
    }
}
