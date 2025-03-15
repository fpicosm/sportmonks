<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class TeamsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_teams_test(): void
    {
        $response = Sportmonks::football()
            ->teams()
            ->all();

        $this->assertEquals('/v3/football/teams', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_team_by_id_test(): void
    {
        $teamId = 83;

        $response = Sportmonks::football()
            ->teams()
            ->find($teamId);

        $this->assertEquals("/v3/football/teams/$teamId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertEquals('FC Barcelona', $response->data->name);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_teams_by_country_id_test(): void
    {
        $countryId = 32;

        $response = Sportmonks::football()
            ->teams()
            ->byCountry($countryId);

        $this->assertEquals("/v3/football/teams/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_teams_by_season_id_test(): void
    {
        $seasonId = 23621;

        $response = Sportmonks::football()
            ->teams()
            ->bySeason($seasonId);

        $this->assertEquals("/v3/football/teams/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_teams_by_name_test(): void
    {
        $name = 'barcel';

        $response = Sportmonks::football()
            ->teams()
            ->search($name);

        $this->assertEquals("/v3/football/teams/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
        $this->assertStringContainsStringIgnoringCase($name, $response->data[0]->name);
    }
}
