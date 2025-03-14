<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class RivalsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_rivals_test(): void
    {
        $response = Sportmonks::football()->rivals()->all();
        $this->assertEquals('/v3/football/rivals', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_rivals_by_team_id_test(): void
    {
        $teamId = 53;
        $response = Sportmonks::football()->rivals()->byTeam($teamId);
        $this->assertEquals("/v3/football/rivals/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
