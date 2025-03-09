<?php

namespace Sportmonks\Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\FormulaOne\FormulaOneApiClient;
use Sportmonks\Clients\ApiResponse;

class Livescores extends FormulaOneApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all($query = []): ApiResponse
    {
        return $this->call('livescores/now', $query);
    }
}
