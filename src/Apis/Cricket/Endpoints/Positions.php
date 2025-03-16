<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class Positions extends CricketClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('positions', $query);
    }

    /**
     * @param int $positionId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $positionId, array $query = []): object
    {
        return $this->getObject("positions/$positionId", $query);
    }
}
