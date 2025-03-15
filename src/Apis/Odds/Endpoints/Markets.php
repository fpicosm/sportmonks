<?php

namespace Sportmonks\Apis\Odds\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Odds\OddsClient;

class Markets extends OddsClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->callArray('markets', $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function premium(array $query = []): object
    {
        return $this->callArray('markets/premium', $query);
    }

    /**
     * @param int $marketId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $marketId, array $query = []): object
    {
        return $this->callArray("markets/$marketId", $query);
    }

    /**
     * @param string $name
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $name, array $query = []): object
    {
        return $this->callArray("markets/search/$name", $query);
    }
}
