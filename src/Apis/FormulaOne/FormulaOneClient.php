<?php

namespace Sportmonks\Apis\FormulaOne;

use Sportmonks\Clients\BaseClient;

class FormulaOneClient extends BaseClient
{
    private array $include = [];
    private array $filters = [];
    private array $sort = [];

    public function __construct()
    {
        parent::__construct('https://f1.sportmonks.com/api/');
    }

    public function setInclude(...$relations): self
    {
        if (is_array($relations[0])) {
            $relations = collect($relations)->flatten()->toArray();
        }

        $this->include = $relations;
        return $this;
    }

    public function setFilters(array $filters = []): self
    {
        $this->filters = $filters;
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

        if (!empty($this->filters)) {
            foreach ($this->filters as $key => $value) {
                $query["filter[$key]"] = $value;
            }
        }

        if (!empty($this->sort)) {
            $query['sort'] = join(',', $this->sort);
        }

        return [
            'query' => [
                ...$query,
                'api_token' => $this->apiToken,
            ],
        ];
    }
}
