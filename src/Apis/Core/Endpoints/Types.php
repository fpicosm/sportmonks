<?php

namespace Sportmonks\Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Core\CoreClient;

class Types extends CoreClient
{
    const array fields = [
        'id',
        'name',
        'code',
        'developer_name',
        'model_type',
        'stat_group',
    ];

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function all(array $query = []): object
    {
        return $this->call('types', $query, []);
    }

    /**
     * @param int $typeId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function find(int $typeId, array $query = []): object
    {
        return $this->call("types/$typeId", $query);
    }

    /**
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byEntities(array $query = []): object
    {
        return $this->call('types/entities', $query, []);
    }
}
