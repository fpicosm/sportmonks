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
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_inplay_livescores_test(): void
    {
        $response = Sportmonks::football()->livescores()->inplay();
        $this->assertEquals('/v3/football/livescores/inplay', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_latest_updated_livescores_test(): void
    {
        $response = Sportmonks::football()->livescores()->lastUpdated();
        $this->assertEquals('/v3/football/livescores/latest', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
