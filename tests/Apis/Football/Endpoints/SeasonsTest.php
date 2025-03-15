<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class SeasonsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_seasons_test(): void
    {
        $response = Sportmonks::football()
            ->seasons()
            ->all();

        $this->assertEquals('/v3/football/seasons', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_season_by_id_test(): void
    {
        $seasonId = 23621;

        $response = Sportmonks::football()
            ->seasons()
            ->find($seasonId);

        $this->assertEquals("/v3/football/seasons/$seasonId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_seasons_by_team_id_test(): void
    {
        $teamId = 83;

        $response = Sportmonks::football()
            ->seasons()
            ->byTeam($teamId);

        $this->assertEquals("/v3/football/seasons/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_seasons_by_name_test(): void
    {
        $name = 2022;

        $response = Sportmonks::football()
            ->seasons()
            ->search($name);

        $this->assertEquals("/v3/football/seasons/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);

        $response = Sportmonks::football()
            ->seasons()
            ->search("$name");

        $this->assertEquals("/v3/football/seasons/search/$name", $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);
    }
}
