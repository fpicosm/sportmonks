<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class PredictionsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_probabilities_test(): void
    {
        $response = Sportmonks::football()
            ->predictions()
            ->all();

        $this->assertEquals('/v3/football/predictions/probabilities', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_predictability_by_league_id_test(): void
    {
        $leagueId = 8;

        $response = Sportmonks::football()
            ->predictions()
            ->byLeague($leagueId);

        $this->assertEquals("/v3/football/predictions/predictability/leagues/$leagueId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_probabilities_by_fixture_id_test(): void
    {
        $fixtureId = 16774022;

        $response = Sportmonks::football()
            ->predictions()
            ->byFixture($fixtureId);

        $this->assertEquals("/v3/football/predictions/probabilities/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
