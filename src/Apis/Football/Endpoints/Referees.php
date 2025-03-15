<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Referees extends FootballClient
{
    const array fields = [
        'id',
        'sport_id',
        'country_id',
        'nationality_id',
        'city_id',
        'common_name',
        'firstname',
        'lastname',
        'name',
        'display_name',
        'image_path',
        'height',
        'weight',
        'date_of_birth',
        'gender',
    ];

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->call('referees', $query, []);
    }

    /**
     * @param int $refereeId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $refereeId, array $query = []): object
    {
        return $this->call("referees/$refereeId", $query);
    }

    /**
     * @param int $countryId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byCountry(int $countryId, array $query = []): object
    {
        return $this->call("referees/countries/$countryId", $query, []);
    }

    /**
     * @param int $seasonId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->call("referees/seasons/$seasonId", $query, []);
    }

    /**
     * @param string $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $search, array $query = []): object
    {
        return $this->call("referees/search/$search", $query, []);
    }
}
