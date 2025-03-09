<?php

namespace Sportmonks\Clients;

use Psr\Http\Message\UriInterface;

readonly class ApiResponse
{
    public function __construct(
        public UriInterface      $url,
        public object|array|null $data = null,
        public object|null       $pagination = null,
    )
    {
    }
}
