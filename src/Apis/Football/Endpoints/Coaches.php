<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Coaches extends FootballClient
{
    const array fields = [
        'id',
        'player_id',
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
        return $this->call('coaches', $query, []);
    }

    /**
     * @param int $coachId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $coachId, array $query = []): object
    {
        return $this->call("coaches/$coachId", $query);
    }

    /**
     * @param int $countryId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byCountry(int $countryId, array $query = []): object
    {
        return $this->call("coaches/countries/$countryId", $query, []);
    }

    /**
     * @param string $search
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function search(string $search, array $query = []): object
    {
        return $this->call("coaches/search/$search", $query, []);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function lastUpdated(array $query = []): object
    {
        return $this->call('coaches/latest', $query, []);
    }
}
