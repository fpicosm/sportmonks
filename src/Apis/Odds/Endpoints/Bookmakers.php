<?php

namespace Sportmonks\Apis\Odds\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Odds\OddsClient;

class Bookmakers extends OddsClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('bookmakers', $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function premium(array $query = []): object
    {
        return $this->getArray('bookmakers/premium', $query);
    }

    /**
     * @param int $bookmakerId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $bookmakerId, array $query = []): object
    {
        return $this->getArray("bookmakers/$bookmakerId", $query);
    }

    /**
     * @param string $name
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $name, array $query = []): object
    {
        return $this->getArray("bookmakers/search/$name", $query);
    }

    /**
     * @param int $fixtureId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->getArray("bookmakers/fixtures/$fixtureId", $query);
    }

    /**
     * @param int $fixtureId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function eventsByFixture(int $fixtureId, array $query = []): object
    {
        return $this->getArray("bookmakers/fixtures/$fixtureId/mapping", $query);
    }
}
