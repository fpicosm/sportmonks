<?php

namespace Sportmonks\Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\FormulaOne\FormulaOneApiClient;
use Sportmonks\Clients\ApiResponse;

class Winners extends FormulaOneApiClient
{
    /**
     * @throws GuzzleException
     */
    public function bySeason(int $seasonId, $query = []): ApiResponse
    {
        return $this->call("tracks/season/$seasonId/winners", $query);
    }
}
