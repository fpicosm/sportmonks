<?php

namespace Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class CitiesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_cities_test(): void
    {
        $response = Sportmonks::core()->cities()->all();
        $this->assertEquals('/v3/core/cities', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_city_by_id_test(): void
    {
        $cityId = 1;
        $response = Sportmonks::core()->cities()->find($cityId);
        $this->assertEquals("/v3/core/cities/$cityId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_cities_by_name_test(): void
    {
        $name = 'lond';
        $response = Sportmonks::core()->cities()->search($name);

        $this->assertEquals("/v3/core/cities/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertStringContainsStringIgnoringCase($name, $response->data[0]->name);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
