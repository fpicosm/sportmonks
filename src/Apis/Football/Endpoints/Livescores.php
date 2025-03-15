<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Livescores extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('livescores', $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function inplay(array $query = []): object
    {
        return $this->getArray('livescores/inplay', $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function lastUpdated(array $query = []): object
    {
        return $this->getArray('livescores/latest', $query);
    }
}
