<?php

namespace Sportmonks\Apis\FormulaOne;

use Sportmonks\Clients\ApiClient;

class FormulaOneApiClient extends ApiClient
{
    public function __construct()
    {
        parent::__construct('https://f1.sportmonks.com/api/v1.0/');
    }

    protected function getParams(array $query): array
    {
        return [
            'query' => [
                'api_token' => $this->apiToken,
                ...$query,
            ]
        ];
    }
}
