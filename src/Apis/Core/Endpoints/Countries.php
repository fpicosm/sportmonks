<?php

namespace Sportmonks\Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Core\CoreClient;

class Countries extends CoreClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->call('countries', $query, []);
    }

    /**
     * @param int $countryId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $countryId, array $query = []): object
    {
        return $this->call("countries/$countryId", $query);
    }

    /**
     * @param string $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $search, array $query = []): object
    {
        return $this->call("countries/search/$search", $query, []);
    }
}
