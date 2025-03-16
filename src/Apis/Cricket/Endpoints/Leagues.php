<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class Leagues extends CricketClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('leagues', $query);
    }

    /**
     * @param int $leagueId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $leagueId, array $query = []): object
    {
        return $this->getObject("leagues/$leagueId", $query);
    }
}
