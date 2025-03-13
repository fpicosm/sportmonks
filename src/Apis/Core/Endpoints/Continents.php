<?php

namespace Sportmonks\Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Core\CoreClient;

class Continents extends CoreClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): object
    {
        return $this->call('continents', [], $query);
    }
}
