<?php

namespace Apis\Football\Endpoints;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Apis\Football\Endpoints\Fixtures;
use Sportmonks\Sportmonks;
use TestCase;

class FixturesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_fixtures_test(): void
    {
        $response = Sportmonks::football()
            ->fixtures()
            ->all();

        $this->assertEquals('/v3/football/fixtures', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_fixture_by_id_test(): void
    {
        $fixtureId = 463;

        $response = Sportmonks::football()
            ->fixtures()
            ->find($fixtureId);

        $this->assertEquals("/v3/football/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertEquals('Tottenham Hotspur vs Manchester City', $response->data->name);
        $this->assertObjectNotHasProperty('pagination', $response);
        $this->assertSchemaEquals(Fixtures::fields, $response->data);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_fixtures_by_multiple_ids_test(): void
    {
        $fixtureIds = [463, 464];

        $response = Sportmonks::football()
            ->fixtures()
            ->multiple($fixtureIds);

        $this->assertEquals('/v3/football/fixtures/multi/' . join(',', $fixtureIds), $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);

        // could be a string, comma separated
        $response = Sportmonks::football()
            ->fixtures()
            ->multiple('463,464');

        $this->assertEquals(200, $response->statusCode);

        $response = Sportmonks::football()
            ->fixtures()
            ->multiple('463, 464');

        $this->assertEquals(200, $response->statusCode);

        // cannot send duplicated values
        $this->expectExceptionCode(422);
        Sportmonks::football()
            ->fixtures()
            ->multiple('463,463');
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_fixtures_by_date_test(): void
    {
        $date = '2025-03-10';

        $response = Sportmonks::football()
            ->fixtures()
            ->byDate($date);

        $this->assertEquals("/v3/football/fixtures/date/$date", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);

        $response = Sportmonks::football()
            ->fixtures()
            ->byDate(Carbon::make($date));

        $this->assertEquals("/v3/football/fixtures/date/$date", $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_fixtures_by_date_range_test(): void
    {
        $from = '2022-07-17';
        $to = '2022-07-25';

        $response = Sportmonks::football()
            ->fixtures()
            ->byDateRange($from, $to);

        $this->assertEquals("/v3/football/fixtures/between/$from/$to", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);

        $response = Sportmonks::football()
            ->fixtures()
            ->byDateRange(Carbon::make($from), $to);

        $this->assertEquals("/v3/football/fixtures/between/$from/$to", $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);

        $response = Sportmonks::football()
            ->fixtures()
            ->byDateRange($from, Carbon::make($to));

        $this->assertEquals("/v3/football/fixtures/between/$from/$to", $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_fixtures_by_date_range_for_team_test(): void
    {
        $from = '2025-03-07';
        $to = '2025-03-14';
        $teamId = 7980;

        $response = Sportmonks::football()
            ->fixtures()
            ->byDateRangeForTeam($from, $to, $teamId);

        $this->assertEquals("/v3/football/fixtures/between/$from/$to/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);

        $response = Sportmonks::football()
            ->fixtures()
            ->byDateRangeForTeam(Carbon::make($from), $to, $teamId);

        $this->assertEquals("/v3/football/fixtures/between/$from/$to/$teamId", $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);

        $response = Sportmonks::football()
            ->fixtures()
            ->byDateRangeForTeam($from, Carbon::make($to), $teamId);

        $this->assertEquals("/v3/football/fixtures/between/$from/$to/$teamId", $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_fixtures_by_head_to_head_test(): void
    {
        $teamId = 7980;
        $rivalId = 83;

        $response = Sportmonks::football()
            ->fixtures()
            ->h2h($teamId, $rivalId);

        $this->assertEquals("/v3/football/fixtures/head-to-head/$teamId/$rivalId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_fixtures_by_name_test(): void
    {
        $name = 'manches';

        $response = Sportmonks::football()
            ->fixtures()
            ->search($name);

        $this->assertEquals("/v3/football/fixtures/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertStringContainsStringIgnoringCase($name, $response->data[0]->name);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_upcoming_fixtures_by_market_id_test(): void
    {
        $marketId = 1;

        $response = Sportmonks::football()
            ->fixtures()
            ->upcomingByMarket($marketId);

        $this->assertEquals("/v3/football/fixtures/upcoming/markets/$marketId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_upcoming_fixtures_by_tv_station_id_test(): void
    {
        $tvStationId = 1;

        $response = Sportmonks::football()
            ->fixtures()
            ->upcomingByTvStation($tvStationId);

        $this->assertEquals("/v3/football/fixtures/upcoming/tv-stations/$tvStationId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_past_fixtures_by_tv_station_id_test(): void
    {
        $tvStationId = 1;

        $response = Sportmonks::football()
            ->fixtures()
            ->pastByTvStation($tvStationId);

        $this->assertEquals("/v3/football/fixtures/past/tv-stations/$tvStationId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_latest_updated_fixtures_test(): void
    {
        $response = Sportmonks::football()
            ->fixtures()
            ->lastUpdated();

        $this->assertEquals('/v3/football/fixtures/latest', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
