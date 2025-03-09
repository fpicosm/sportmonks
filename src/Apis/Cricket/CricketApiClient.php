<?php

namespace Sportmonks\Apis\Cricket;

use Sportmonks\Clients\ApiClient;

class CricketApiClient extends ApiClient
{
    protected array $fields = [];
    protected array $filters = [];
    protected array $include = [];
    protected array $sortBy = [];

    public function __construct()
    {
        parent::__construct('https://cricket.sportmonks.com/api/v2.0/');
    }

    public function setFields(...$fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    public function setFilters(array $filters): self
    {
        $this->filters = $filters;
        return $this;
    }

    public function setInclude(...$relations): self
    {
        $this->include = $relations;
        return $this;
    }

    public function sortBy(...$keys): self
    {
        $this->sortBy = $keys;
        return $this;
    }

    protected function getParams(array $query): array
    {
        if (!empty($this->fields)) {
            $query['fields[object]'] = join(',', $this->fields);
        }

        if (!empty($this->filters)) {
            collect($this->filters)->each(function ($value, $key) use (&$query) {
                $query["filter[$key]"] = $value;
            });
        }

        if (!empty($this->include)) {
            $query['include'] = join(',', $this->include);
        }

        if (!empty($this->sortBy)) {
            $query['sort'] = join(',', $this->sortBy);
        }

        return [
            'query' => [
                ...$query,
                'api_token' => $this->apiToken,
                'timezone' => config('sportmonks.timezone'),
            ]
        ];
    }
}
