<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class StagesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_stages_test()
    {
        $response = Sportmonks::football()->stages()->all();
        $this->assertEquals('/v3/football/stages', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_stage_by_id_test()
    {
        $stageId = 77471332;
        $response = Sportmonks::football()->stages()->find($stageId);
        $this->assertEquals("/v3/football/stages/$stageId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_stages_by_season_id_test()
    {
        $seasonId = 23621;
        $response = Sportmonks::football()->stages()->bySeason($seasonId);
        $this->assertEquals("/v3/football/stages/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_stages_by_name_test()
    {
        $name = 'Regular';
        $response = Sportmonks::football()->stages()->search($name);
        $this->assertEquals("/v3/football/stages/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
