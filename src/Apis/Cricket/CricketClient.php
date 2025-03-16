<?php

namespace Sportmonks\Apis\Cricket;

use Sportmonks\Clients\BaseClient;

class CricketClient extends BaseClient
{
    private array $include = [];
    private array $filters = [];
    private array $fields = [];
    private array $sort = [];

    public function __construct()
    {
        parent::__construct('https://cricket.sportmonks.com/api/v2.0/');
    }

    /**
     * @param $relations
     * @return $this
     * @example setInclude('country', 'seasons')
     * @example setInclude(['country', 'seasons'])
     * @example setInclude('country,seasons')
     */
    public function setInclude(...$relations): self
    {
        if (is_array($relations[0])) {
            $relations = collect($relations)->flatten()->toArray();
        }

        $this->include = $relations;
        return $this;
    }

    /**
     * @param array<string, mixed> $filters key-value pair with filters
     * @return $this
     * @example setFilters(['continent_id' => 1])
     * @example setFilters(['continent_id' => 1, 'name' => 'Poland'])
     */
    public function setFilters(array $filters = []): self
    {
        $this->filters = $filters;
        return $this;
    }

    public function setFields(...$fields): self
    {
        if (is_array($fields[0])) {
            $fields = collect($fields)->flatten()->toArray();
        }

        $this->fields = $fields;
        return $this;
    }

    public function sortBy(...$fields): self
    {
        if (is_array($fields[0])) {
            $fields = collect($fields)->flatten()->toArray();
        }

        $this->sort = $fields;
        return $this;
    }

    protected function getParams(array $query = []): array
    {
        if (!empty($this->include)) {
            $query['include'] = join(',', $this->include);
        }

        if (!empty($this->fields)) {
            $query['fields[object]'] = join(',', $this->fields);
        }

        if (!empty($this->sort)) {
            $query['sort'] = join(',', $this->sort);
        }

        if (!empty($this->filters)) {
            foreach ($this->filters as $key => $value) {
                $query["filter[$key]"] = $value;
            }
        }

        return [
            'query' => [
                ...$query,
                'api_token' => $this->apiToken,
                'timezone' => config('sportmonks.timezone'),
            ],
        ];
    }
}
