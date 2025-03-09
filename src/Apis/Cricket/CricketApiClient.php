<?php

namespace Sportmonks\Apis\Cricket;

use Sportmonks\Clients\ApiClient;

class CricketApiClient extends ApiClient
{
    public function __construct()
    {
        parent::__construct('https://cricket.sportmonks.com/api/v2.0/');
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
