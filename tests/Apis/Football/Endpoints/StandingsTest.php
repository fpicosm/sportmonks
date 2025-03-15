<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class StandingsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_standings_test()
    {
        $response = Sportmonks::football()
            ->standings()
            ->all();

        $this->assertEquals('/v3/football/standings', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_standings_by_season_id_test()
    {
        $seasonId = 23621;

        $response = Sportmonks::football()
            ->standings()
            ->bySeason($seasonId);
        
        $this->assertEquals("/v3/football/standings/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_standings_correction_by_season_id_test()
    {
        $seasonId = 23621;

        $response = Sportmonks::football()
            ->standings()
            ->correctionBySeason($seasonId);

        $this->assertEquals("/v3/football/standings/corrections/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_standings_by_round_id_test()
    {
        $roundId = 339303;

        $response = Sportmonks::football()
            ->standings()
            ->byRound($roundId);

        $this->assertEquals("/v3/football/standings/rounds/$roundId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_live_standings_by_league_id_test()
    {
        $leagueId = 8;

        $response = Sportmonks::football()
            ->standings()
            ->liveByLeague($leagueId);

        $this->assertEquals("/v3/football/standings/live/leagues/$leagueId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
