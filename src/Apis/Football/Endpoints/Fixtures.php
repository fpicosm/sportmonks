<?php

namespace Sportmonks\Apis\Football\Endpoints;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Fixtures extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('fixtures', $query);
    }

    /**
     * @throws GuzzleException
     */
    public function find(int $fixtureId, $query = []): ApiResponse
    {
        return $this->call("fixtures/$fixtureId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function multiple(array $fixtureIds, $query = []): ApiResponse
    {
        return $this->call('fixtures/' . join(',', $fixtureIds), $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byDate(string|Carbon $date, $query = []): ApiResponse
    {
        return $this->call("fixtures/date/{$this->formatDate($date)}", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byDateRange(string|Carbon $start, string|Carbon $end, $query = []): ApiResponse
    {
        return $this->call("fixtures/between/{$this->formatDate($start)}/{$this->formatDate($end)}", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byDateRangeForTeam(string|Carbon $start, string|Carbon $end, int $teamId, $query = []): ApiResponse
    {
        return $this->call("fixtures/between/{$this->formatDate($start)}/{$this->formatDate($end)}/$teamId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function h2h(int $firstTeamId, int $secondTeamId, $query = []): ApiResponse
    {
        return $this->call("fixtures/head-to-head/$firstTeamId/$secondTeamId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $search, $query = []): ApiResponse
    {
        return $this->call("fixtures/search/$search", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function upcomingByMarket(int $marketId, $query = []): ApiResponse
    {
        return $this->call("fixtures/upcoming/markets/$marketId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function upcomingByTvStation(int $tvStationId, $query = []): ApiResponse
    {
        return $this->call("fixtures/upcoming/tv-stations/$tvStationId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function pastByTvStation(int $tvStationId, $query = []): ApiResponse
    {
        return $this->call("fixtures/past/tv-stations/$tvStationId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function latest($query = []): ApiResponse
    {
        return $this->call('fixtures/latest', $query);
    }
}
