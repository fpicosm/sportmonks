<?php

namespace Apis\Football\Endpoints;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class TransfersTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_transfers_test(): void
    {
        $response = Sportmonks::football()->transfers()->all();
        $this->assertEquals('/v3/football/transfers', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_transfer_by_id_test(): void
    {
        $transferId = 4;
        $response = Sportmonks::football()->transfers()->find($transferId);
        $this->assertEquals("/v3/football/transfers/$transferId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_latest_transfers_test(): void
    {
        $response = Sportmonks::football()->transfers()->latest();
        $this->assertEquals('/v3/football/transfers/latest', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_transfers_between_date_range_test(): void
    {
        $from = '2025-01-01';
        $to = '2025-01-20';
        $response = Sportmonks::football()->transfers()->byDateRange($from, $to);
        $this->assertEquals("/v3/football/transfers/between/$from/$to", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);

        $to = Carbon::make($from)->addDays(31)->toDateString();
        $response = Sportmonks::football()->transfers()->byDateRange($from, $to);
        $this->assertEquals("/v3/football/transfers/between/$from/$to", $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);

        $to = Carbon::make($from)->addDays(32)->toDateString();
        $this->expectExceptionCode(422);
        Sportmonks::football()->transfers()->byDateRange($from, $to);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_transfers_by_team_id_test(): void
    {
        $teamId = 83;
        $response = Sportmonks::football()->transfers()->byTeam($teamId);
        $this->assertEquals("/v3/football/transfers/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_transfers_by_player_id_test(): void
    {
        $playerId = 24092472;
        $response = Sportmonks::football()->transfers()->byPlayer($playerId);
        $this->assertEquals("/v3/football/transfers/players/$playerId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
