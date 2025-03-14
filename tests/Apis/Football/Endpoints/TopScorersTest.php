<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class TopScorersTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_topscorers_by_season_id_test()
    {
        $seasonId = 23621;
        $response = Sportmonks::football()->topScorers()->bySeason($seasonId);
        $this->assertEquals("/v3/football/topscorers/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_topscorers_by_stage_id_test()
    {
        $stageId = 77471332;
        $response = Sportmonks::football()->topScorers()->byStage($stageId);
        $this->assertEquals("/v3/football/topscorers/stages/$stageId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
