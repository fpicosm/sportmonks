<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Apis\Football\Endpoints\ValueBets;
use Sportmonks\Sportmonks;
use TestCase;

class ValueBetsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_value_bets_test(): void
    {
        $response = Sportmonks::football()
            ->predictions()
            ->valueBets()
            ->all();

        $this->assertEquals('/v3/football/predictions/value-bets', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
        $this->assertSchemaEquals(ValueBets::fields, $response->data[0]);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_value_bets_by_fixture_id_test(): void
    {
        $fixtureId = 18535050;

        $response = Sportmonks::football()
            ->predictions()
            ->valueBets()
            ->byFixture($fixtureId);

        $this->assertEquals("/v3/football/predictions/value-bets/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
