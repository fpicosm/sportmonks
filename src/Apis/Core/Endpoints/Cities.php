<?php

namespace Sportmonks\Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Core\CoreClient;

class Cities extends CoreClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('cities', $query);
    }

    /**
     * @param int $cityId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $cityId, array $query = []): object
    {
        return $this->getObject("cities/$cityId", $query);
    }

    /**
     * @param string $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $search, array $query = []): object
    {
        return $this->getArray("cities/search/$search", $query);
    }
}
