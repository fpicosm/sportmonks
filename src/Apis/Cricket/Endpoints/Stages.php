<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class Stages extends CricketClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('stages', $query);
    }

    /**
     * @param int $stageId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $stageId, array $query = []): object
    {
        return $this->getObject("stages/$stageId", $query);
    }
}
