<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class RefereesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_referees_test(): void
    {
        $response = Sportmonks::football()
            ->referees()
            ->all();

        $this->assertEquals('/v3/football/referees', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_referee_by_id_test(): void
    {
        $refereeId = 28;

        $response = Sportmonks::football()
            ->referees()
            ->find($refereeId);

        $this->assertEquals("/v3/football/referees/$refereeId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertEquals('Bjorn Kuipers', $response->data->common_name);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_referees_by_country_id_test(): void
    {
        $countryId = 320;

        $response = Sportmonks::football()
            ->referees()
            ->byCountry($countryId);

        $this->assertEquals("/v3/football/referees/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_referees_by_season_id_test(): void
    {
        $seasonId = 19686;

        $response = Sportmonks::football()
            ->referees()
            ->bySeason($seasonId);

        $this->assertEquals("/v3/football/referees/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_referees_by_name_test(): void
    {
        $name = 'kuip';

        $response = Sportmonks::football()
            ->referees()
            ->search($name);

        $this->assertEquals("/v3/football/referees/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
        $this->assertStringContainsStringIgnoringCase($name, $response->data[0]->name);
    }
}
