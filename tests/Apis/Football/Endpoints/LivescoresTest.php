<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class LivescoresTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_livescores_test(): void
    {
        $response = Sportmonks::football()->livescores()->all();

        $this->assertEquals('/v3/football/livescores', $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
