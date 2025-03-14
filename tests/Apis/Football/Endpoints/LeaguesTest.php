<?php

namespace Apis\Football\Endpoints;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class LeaguesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_leagues_test(): void
    {
        $response = Sportmonks::football()->leagues()->all();
        $this->assertEquals('/v3/football/leagues', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_league_by_id_test(): void
    {
        $leagueId = 564;
        $response = Sportmonks::football()->leagues()->find($leagueId);
        $this->assertEquals("/v3/football/leagues/$leagueId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertEquals('La Liga', $response->data->name);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_leagues_by_live_test(): void
    {
        $response = Sportmonks::football()->leagues()->live();
        $this->assertEquals('/v3/football/leagues/live', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_leagues_by_fixture_date_test(): void
    {
        $date = '2022-07-15';
        $response = Sportmonks::football()->leagues()->byFixtureDate($date);
        $this->assertEquals("/v3/football/leagues/date/$date", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);

        $response = Sportmonks::football()->leagues()->byFixtureDate(Carbon::make($date));
        $this->assertEquals("/v3/football/leagues/date/$date", $response->url->getPath());
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_leagues_by_country_id_test(): void
    {
        $countryId = 32;
        $response = Sportmonks::football()->leagues()->byCountry($countryId);
        $this->assertEquals("/v3/football/leagues/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_leagues_by_name_test(): void
    {
        $name = 'premier';
        $response = Sportmonks::football()->leagues()->search($name);
        $this->assertEquals("/v3/football/leagues/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_leagues_by_team_id_test(): void
    {
        $teamId = 6;
        $response = Sportmonks::football()->leagues()->allByTeam($teamId);
        $this->assertEquals("/v3/football/leagues/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_current_leagues_by_team_id_test(): void
    {
        $teamId = 6;
        $response = Sportmonks::football()->leagues()->currentByTeam($teamId);
        $this->assertEquals("/v3/football/leagues/teams/$teamId/current", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
