<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class RoundsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_rounds_test()
    {
        $response = Sportmonks::football()->rounds()->all();
        $this->assertEquals('/v3/football/rounds', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_round_by_id_test()
    {
        $roundId = 339294;
        $response = Sportmonks::football()->rounds()->find($roundId);
        $this->assertEquals("/v3/football/rounds/$roundId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_rounds_by_season_id_test()
    {
        $seasonId = 23621;
        $response = Sportmonks::football()->rounds()->bySeason($seasonId);
        $this->assertEquals("/v3/football/rounds/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_rounds_by_name_test()
    {
        $name = 2;
        $response = Sportmonks::football()->rounds()->search($name);
        $this->assertEquals("/v3/football/rounds/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);

        $response = Sportmonks::football()->rounds()->search("$name");
        $this->assertEquals("/v3/football/rounds/search/$name", $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);
    }
}
