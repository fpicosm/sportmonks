<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class NewsPreMatch extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->call('news/pre-match', $query, []);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->call("news/pre-match/seasons/$seasonId", $query, []);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function upcoming(array $query = []): object
    {
        return $this->call('news/pre-match/upcoming', $query, []);
    }
}
