<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class Continents extends CricketClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('continents', $query);
    }

    /**
     * @param int $continentId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $continentId, array $query = []): object
    {
        return $this->getObject("continents/$continentId", $query);
    }
}
