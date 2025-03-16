<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class Scores extends CricketClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('scores', $query);
    }

    /**
     * @param int $scoreId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $scoreId, array $query = []): object
    {
        return $this->getObject("scores/$scoreId", $query);
    }
}
