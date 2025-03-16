<?php

namespace Sportmonks\Apis\Cricket\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Cricket\CricketClient;

class Countries extends CricketClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('countries', $query);
    }

    /**
     * @param int $countryId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $countryId, array $query = []): object
    {
        return $this->getObject("countries/$countryId", $query);
    }
}
