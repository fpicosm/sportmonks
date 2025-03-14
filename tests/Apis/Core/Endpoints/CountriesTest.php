<?php

namespace Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class CountriesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_countries_test(): void
    {
        $response = Sportmonks::core()->countries()->all();
        $this->assertEquals('/v3/core/countries', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_country_by_id_test(): void
    {
        $countryId = 32;
        $response = Sportmonks::core()->countries()->find($countryId);
        $this->assertEquals("/v3/core/countries/$countryId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_countries_by_name_test(): void
    {
        $name = 'spain';
        $response = Sportmonks::core()->countries()->search($name);
        $this->assertEquals("/v3/core/countries/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertStringContainsStringIgnoringCase($name, $response->data[0]->name);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
