<?php

namespace Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class TimezonesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_timezones_test(): void
    {
        $response = Sportmonks::core()->timezones()->all();
        $this->assertEquals('/v3/core/timezones', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyString($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
