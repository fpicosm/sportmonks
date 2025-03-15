<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Apis\Football\Endpoints\Expected;
use Sportmonks\Sportmonks;
use TestCase;

class ExpectedTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_expected_by_team_test(): void
    {
        $response = Sportmonks::football()
            ->expected()
            ->byTeam();

        $this->assertEquals('/v3/football/expected/fixtures', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
        $this->assertSchemaEquals(Expected::fields, $response->data[0]);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_expected_by_player_test(): void
    {
        $response = Sportmonks::football()
            ->expected()
            ->byPlayer();

        $this->assertEquals('/v3/football/expected/lineups', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
        $this->assertSchemaEquals(Expected::fields, $response->data[0]);
    }
}
