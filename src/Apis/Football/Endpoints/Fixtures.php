<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Fixtures extends FootballClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): object
    {
        return $this->call('fixtures', [], $query);
    }
}
