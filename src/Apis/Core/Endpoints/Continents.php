<?php

namespace Sportmonks\Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Core\CoreClient;

class Continents extends CoreClient
{
    const array fields = [
        'id',
        'name',
        'code',
    ];

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->call('continents', $query, []);
    }

    /**
     * @param int $continentId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $continentId, array $query = []): object
    {
        return $this->call("continents/$continentId", $query);
    }
}
