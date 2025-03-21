<?php

namespace Sportmonks\Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Core\CoreClient;

class Regions extends CoreClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('regions', $query);
    }

    /**
     * @param int $regionId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $regionId, array $query = []): object
    {
        return $this->getObject("regions/$regionId", $query);
    }

    /**
     * @param string $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $search, array $query = []): object
    {
        return $this->getArray("regions/search/$search", $query);
    }
}
