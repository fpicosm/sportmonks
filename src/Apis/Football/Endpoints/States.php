<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class States extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('states', $query);
    }

    /**
     * @param int $stateId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $stateId, array $query = []): object
    {
        return $this->getObject("states/$stateId", $query);
    }
}
