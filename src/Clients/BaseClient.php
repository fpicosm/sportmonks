<?php

namespace Sportmonks\Clients;


use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\TransferStats;
use InvalidArgumentException;

abstract class BaseClient
{
    protected Client $client;
    protected string $apiToken;

    public function __construct(string $baseUrl)
    {
        $this->apiToken = config('sportmonks.api_token') ?? '';

        if (empty($this->apiToken)) {
            throw new InvalidArgumentException('No API token set');
        }

        $this->client = new Client([
            'base_uri' => $baseUrl
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function call(string $url, $params = [], array|null $defaultValue = null): object
    {
        $response = $this->client->get($url, [
            ...$this->getParams($params),
            'on_stats' => function (TransferStats $stats) use (&$url) {
                $url = $stats->getEffectiveUri();
            },
        ]);

        $result = (function () use ($response, $defaultValue) {
            $response = json_decode($response->getBody()->getContents());

            return [
                ...(array)$response,
                'data' => empty($response->data) ? $defaultValue : $response->data,
            ];
        })();

        return (object)[
            ...$result,
            'url' => $url,
            'statusCode' => $response->getStatusCode(),
        ];
    }

    abstract protected function getParams(array $query): array;

    protected function formatDate(string|Carbon $date, $format = 'Y-m-d'): string
    {
        return Carbon::make($date)->format($format);
    }
}
