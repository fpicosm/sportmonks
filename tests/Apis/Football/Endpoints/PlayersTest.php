<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class PlayersTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_players_test(): void
    {
        $response = Sportmonks::football()->players()->all();
        $this->assertEquals('/v3/football/players', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_player_by_id_test(): void
    {
        $playerId = 14;
        $response = Sportmonks::football()->players()->find($playerId);
        $this->assertEquals("/v3/football/players/$playerId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertEquals('D. Agger', $response->data->common_name);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_players_by_country_id_test(): void
    {
        $countryId = 320;
        $response = Sportmonks::football()->players()->byCountry($countryId);
        $this->assertEquals("/v3/football/players/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_players_by_name_test(): void
    {
        $name = 'Agg';
        $response = Sportmonks::football()->players()->search($name);
        $this->assertEquals("/v3/football/players/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertStringContainsStringIgnoringCase($name, $response->data[0]->name);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_last_updated_players_test(): void
    {
        $response = Sportmonks::football()->players()->lastUpdated();
        $this->assertEquals("/v3/football/players/latest", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
