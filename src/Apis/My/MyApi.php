<?php

namespace Sportmonks\Apis\My;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Clients\SportmonksV3Client;

class MyApi extends SportmonksV3Client
{
    public function __construct()
    {
        parent::__construct('https://api.sportmonks.com/v3/my/');
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function enrichments(array $query = []): object
    {
        return $this->callArray('enrichments', $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function resources(array $query = []): object
    {
        return $this->callArray('resources', $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function leagues(array $query = []): object
    {
        return $this->callArray('leagues', $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function usage(array $query = []): object
    {
        return $this->callArray('usage', $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function filters(array $query = []): object
    {
        return $this->callObject('filters/entity', $query);
    }
}
