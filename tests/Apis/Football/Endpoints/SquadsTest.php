<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class SquadsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_team_squad_by_team_id_test()
    {
        $teamId = 282;
        $response = Sportmonks::football()->squads()->currentByTeam($teamId);
        $this->assertEquals("/v3/football/squads/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_extended_team_squad_by_team_id_test()
    {
        $teamId = 83;
        $response = Sportmonks::football()->squads()->extendedByTeam($teamId);
        $this->assertEquals("/v3/football/squads/teams/$teamId/extended", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_team_squad_by_season_id_and_team_id_test()
    {
        $seasonId = 23621;
        $teamId = 83;
        $response = Sportmonks::football()->squads()->bySeasonAndTeam($seasonId, $teamId);
        $this->assertEquals("/v3/football/squads/seasons/$seasonId/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
