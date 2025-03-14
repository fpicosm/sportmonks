<?php

namespace Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class RegionsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_regions_test(): void
    {
        $response = Sportmonks::core()->regions()->all();
        $this->assertEquals('/v3/core/regions', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_region_by_id_test(): void
    {
        $regionId = 1;
        $response = Sportmonks::core()->regions()->setInclude('cities')->find($regionId);
        $this->assertEquals("/v3/core/regions/$regionId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_regions_by_name_test(): void
    {
        $name = 'madrid';
        $response = Sportmonks::core()->regions()->search($name);
        $this->assertEquals("/v3/core/regions/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertStringContainsStringIgnoringCase($name, $response->data[0]->name);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
