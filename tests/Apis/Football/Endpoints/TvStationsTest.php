<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class TvStationsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_tv_stations_test()
    {
        $response = Sportmonks::football()
            ->tvStations()
            ->all();

        $this->assertEquals('/v3/football/tv-stations', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_tv_station_by_id_test()
    {
        $tvStationId = 1;

        $response = Sportmonks::football()
            ->tvStations()
            ->find($tvStationId);

        $this->assertEquals("/v3/football/tv-stations/$tvStationId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_tv_stations_by_fixture_id_test()
    {
        $fixtureId = 1;
        
        $response = Sportmonks::football()
            ->tvStations()
            ->byFixture($fixtureId);

        $this->assertEquals("/v3/football/tv-stations/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
