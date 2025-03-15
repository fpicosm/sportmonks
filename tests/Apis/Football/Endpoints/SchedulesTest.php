<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class SchedulesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_schedules_by_season_id_test()
    {
        $seasonId = 23621;

        $response = Sportmonks::football()
            ->schedules()
            ->bySeason($seasonId);

        $this->assertEquals("/v3/football/schedules/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_schedules_by_team_id_test()
    {
        $teamId = 83;

        $response = Sportmonks::football()
            ->schedules()
            ->byTeam($teamId);

        $this->assertEquals("/v3/football/schedules/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_schedules_by_season_id_and_team_id_test()
    {
        $seasonId = 23621;
        $teamId = 83;

        $response = Sportmonks::football()
            ->schedules()
            ->bySeasonAndTeam($seasonId, $teamId);

        $this->assertEquals("/v3/football/schedules/seasons/$seasonId/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
