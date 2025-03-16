<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class Standings extends CricketClient
{
    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->getArray("standings/season/$seasonId", $query);
    }

    /**
     * @param int $stageId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byStage(int $stageId, array $query = []): object
    {
        return $this->getArray("standings/stage/$stageId", $query);
    }
}
