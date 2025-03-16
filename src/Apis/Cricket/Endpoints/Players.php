<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class Players extends CricketClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('players', $query);
    }

    /**
     * @param int $playerId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $playerId, array $query = []): object
    {
        return $this->getObject("players/$playerId", $query);
    }
}
