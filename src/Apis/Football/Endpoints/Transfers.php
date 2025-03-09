<?php

namespace Sportmonks\Apis\Football\Endpoints;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Transfers extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('transfers', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $transferId, $query = []): ApiResponse
    {
        return $this->call("transfers/$transferId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function latest($query = []): ApiResponse
    {
        return $this->call('transfers/latest', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byDateRange(string|Carbon $start, string|Carbon $end, $query = []): ApiResponse
    {
        return $this->call("transfers/between/{$this->formatDate($start)}/{$this->formatDate($end)}", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byTeam(int $teamId, $query = []): ApiResponse
    {
        return $this->call("transfers/teams/$teamId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byPlayer(int $playerId, $query = []): ApiResponse
    {
        return $this->call("transfers/players/$playerId", $query);
    }
}
