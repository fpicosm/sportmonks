<?php

namespace Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class ContinentsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_continents_test(): void
    {
        $response = Sportmonks::core()
            ->continents()
            ->all();

        $this->assertEquals('/v3/core/continents', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_continent_by_id_test(): void
    {
        $continentId = 1;

        $response = Sportmonks::core()
            ->continents()
            ->find($continentId);

        $this->assertEquals("/v3/core/continents/$continentId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertEquals('Europe', $response->data->name);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
