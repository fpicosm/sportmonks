<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class VenuesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_venues_test()
    {
        $response = Sportmonks::football()->venues()->all();
        $this->assertEquals('/v3/football/venues', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_venue_by_id_test()
    {
        $venueId = 206;
        $response = Sportmonks::football()->venues()->find($venueId);
        $this->assertEquals("/v3/football/venues/$venueId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertEquals('Old Trafford', $response->data->name);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_venues_by_season_id_test()
    {
        $seasonId = 23621;
        $response = Sportmonks::football()->venues()->bySeason($seasonId);
        $this->assertEquals("/v3/football/venues/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_venues_by_name_test()
    {
        $name = 'trafford';
        $response = Sportmonks::football()->venues()->search($name);
        $this->assertEquals("/v3/football/venues/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
