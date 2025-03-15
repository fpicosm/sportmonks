<?php

namespace Sportmonks\Apis\Football\Endpoints;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Transfers extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->getArray('transfers', $query);
    }

    /**
     * @param int $transferId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $transferId, array $query = []): object
    {
        return $this->getObject("transfers/$transferId", $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function latest(array $query = []): object
    {
        return $this->getArray('transfers/latest', $query);
    }

    /**
     * @param string|Carbon $from
     * @param string|Carbon $to
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byDateRange(string|Carbon $from, string|Carbon $to, array $query = []): object
    {
        return $this->getArray("transfers/between/{$this->formatDate($from)}/{$this->formatDate($to)}", $query);
    }

    /**
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byTeam(int $teamId, array $query = []): object
    {
        return $this->getArray("transfers/teams/$teamId", $query);
    }

    /**
     * @param int $playerId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byPlayer(int $playerId, array $query = []): object
    {
        return $this->getArray("transfers/players/$playerId", $query);
    }
}
