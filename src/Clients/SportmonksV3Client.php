<?php

namespace Sportmonks\Clients;

use InvalidArgumentException;

class SportmonksV3Client extends BaseClient
{
    protected array $include = [];
    protected array $select = [];
    protected array $filters = [];
    protected ?int $page = null;
    protected ?int $pageSize = null;
    protected ?string $sortBy = null;
    protected ?string $sortOrder = null;

    public function setInclude(...$relations): self
    {
        $this->include = $relations;
        return $this;
    }

    public function setSelect(...$fields): self
    {
        $this->select = $fields;
        return $this;
    }

    public function getPage(int $pageNumber, int $pageSize = null, string $orderBy = 'id'): self
    {
        $this->page = $pageNumber;
        $this->pageSize = $pageSize;
        $this->sortOrder = $orderBy;

        return $this;
    }

    public function sortBy(string $key, string $order = 'asc'): self
    {
        if (!in_array($order, ['asc', 'desc'])) {
            throw new InvalidArgumentException("Direction should be 'asc' or 'desc'.");
        }

        $this->sortBy = $key;
        $this->sortOrder = $order;

        return $this;
    }

    public function setFilters(string|array $filters): self
    {
        $this->filters = (function () use ($filters) {
            if (is_string($filters)) {
                return explode(";", $filters);
            }

            return collect($filters)
                ->map(fn(mixed $value) => is_array($value) ? join(',', $value) : str($value)->value())
                ->map(fn(string $value, string|int $key) => is_numeric($key) ? $value : "$key:$value")
                ->toArray();
        })();

        return $this;
    }

    protected function getParams($query = []): array
    {
        if (!empty($this->filters)) {
            $query['filters'] = join(';', $this->filters);
        }

        if (!empty($this->include)) {
            $query['include'] = join(';', $this->include);
        }

        if (!empty($this->page)) {
            $query['page'] = $this->page;
            $query['per_page'] = $this->pageSize ?? config('sportmonks.per_page');
            $query['order'] = $this->sortOrder;
        }

        if (!empty($this->select)) {
            $query['select'] = join(',', $this->select);
        }

        if (!empty($this->sortBy)) {
            $query['sortBy'] = $this->sortBy;
            $query['order'] = $this->sortOrder;
        }

        return [
            'headers' => [
                'Authorization' => $this->apiToken,
            ],

            'query' => [
                ...$query,
                'timezone' => config('sportmonks.timezone'),
            ],
        ];
    }
}
