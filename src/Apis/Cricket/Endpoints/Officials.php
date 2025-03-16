<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class Officials extends CricketClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('officials', $query);
    }

    /**
     * @param int $officialId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $officialId, array $query = []): object
    {
        return $this->getObject("officials/$officialId", $query);
    }
}
