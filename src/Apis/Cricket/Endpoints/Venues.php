<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class Venues extends CricketClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('venues', $query);
    }

    /**
     * @param int $venueId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $venueId, array $query = []): object
    {
        return $this->getObject("venues/$venueId", $query);
    }
}
