<?php

namespace Sportmonks\Clients;

use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\TransferStats;
use InvalidArgumentException;

abstract class ApiClient
{
    protected Client $client;
    protected string $apiToken;

    /**
     * Initializes the API client with the given base URI and retrieves the API token from configuration.
     *
     * @param string $baseUri The base URI for the API requests.
     * @throws InvalidArgumentException if no API token is set in the configuration.
     */
    public function __construct(string $baseUri)
    {
        $this->apiToken = config('sportmonks.api_token') ?? '';

        if (empty($this->apiToken)) {
            throw new InvalidArgumentException('No API token set');
        }

        $this->client = new Client([
            'base_uri' => $baseUri,
        ]);
    }

    /**
     * @throws Exception|GuzzleException
     */
    public function call(string $url, array $params = [], mixed $defaultValue = null): ApiResponse
    {
        $response = $this->client->get($url, [
            ...$this->getParams($params),
            'on_stats' => function (TransferStats $stats) use (&$url) {
                $url = $stats->getEffectiveUri();
            },
        ]);

        $response = json_decode($response->getBody()->getContents());

        return new ApiResponse(
            $url,
            $response->data ?? $defaultValue,
            $response->pagination ?? null,
        );
    }

    abstract protected function getParams(array $query): array;

    protected function formatDate(string|Carbon $date, $format = 'Y-m-d'): string
    {
        return Carbon::make($date)->format($format);
    }

    protected function timestamp(int|Carbon $date): string
    {
        return Carbon::make($date)->timestamp;
    }
}
