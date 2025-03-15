<?php

namespace Sportmonks\Apis\Football\Endpoints;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Fixtures extends FootballClient
{
    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->call('fixtures', $query, []);
    }

    /**
     * @param int $fixtureId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $fixtureId, array $query = []): object
    {
        return $this->call("fixtures/$fixtureId", $query);
    }

    /**
     * @param array|string $fixtureIds
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function multiple(array|string $fixtureIds, array $query = []): object
    {
        $fixtureIds = is_array($fixtureIds)
            ? join(',', $fixtureIds)
            : $fixtureIds;

        return $this->call("fixtures/multi/$fixtureIds", $query, []);
    }

    /**
     * @param string|Carbon $date
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byDate(string|Carbon $date, array $query = []): object
    {
        return $this->call("fixtures/date/{$this->formatDate($date)}", $query, []);
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
        return $this->call("fixtures/between/{$this->formatDate($from)}/{$this->formatDate($to)}", $query, []);
    }

    /**
     * @param string|Carbon $from
     * @param string|Carbon $to
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byDateRangeForTeam(string|Carbon $from, string|Carbon $to, int $teamId, array $query = []): object
    {
        return $this->call("fixtures/between/{$this->formatDate($from)}/{$this->formatDate($to)}/$teamId", $query, []);
    }

    /**
     * @param int $firstTeamId
     * @param int $secondTeamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function h2h(int $firstTeamId, int $secondTeamId, array $query = []): object
    {
        return $this->call("fixtures/head-to-head/$firstTeamId/$secondTeamId", $query, []);
    }

    /**
     * @param string $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $search, array $query = []): object
    {
        return $this->call("fixtures/search/$search", $query, []);
    }

    /**
     * @param int $marketId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function upcomingByMarket(int $marketId, array $query = []): object
    {
        return $this->call("fixtures/upcoming/markets/$marketId", $query, []);
    }

    /**
     * @param int $tvStationId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function upcomingByTvStation(int $tvStationId, array $query = []): object
    {
        return $this->call("fixtures/upcoming/tv-stations/$tvStationId", $query, []);
    }

    /**
     * @param int $tvStationId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function pastByTvStation(int $tvStationId, array $query = []): object
    {
        return $this->call("fixtures/past/tv-stations/$tvStationId", $query, []);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function lastUpdated(array $query = []): object
    {
        return $this->call('fixtures/latest', $query, []);
    }
}
