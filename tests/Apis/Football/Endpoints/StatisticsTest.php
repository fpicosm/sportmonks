<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class StatisticsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_statistics_by_stage_id_test()
    {
        $stageId = 77468271;

        $response = Sportmonks::football()
            ->statistics()
            ->byStage($stageId);

        $this->assertEquals("/v3/football/statistics/stages/$stageId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_statistics_by_round_id_test()
    {
        $roundId = 362767;

        $response = Sportmonks::football()
            ->statistics()
            ->byRound($roundId);

        $this->assertEquals("/v3/football/statistics/rounds/$roundId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_statistics_by_player_id_test()
    {
        $playerId = 14;

        $response = Sportmonks::football()
            ->statistics()
            ->byPlayer($playerId);

        $this->assertEquals("/v3/football/statistics/seasons/players/$playerId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_statistics_by_team_id_test()
    {
        $teamId = 83;

        $response = Sportmonks::football()
            ->statistics()
            ->byTeam($teamId);

        $this->assertEquals("/v3/football/statistics/seasons/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_statistics_by_coach_id_test()
    {
        $coachId = 452946;

        $response = Sportmonks::football()
            ->statistics()
            ->byCoach($coachId);

        $this->assertEquals("/v3/football/statistics/seasons/coaches/$coachId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_statistics_by_referee_id_test()
    {
        $refereeId = 28;
        
        $response = Sportmonks::football()
            ->statistics()
            ->byReferee($refereeId);

        $this->assertEquals("/v3/football/statistics/seasons/referees/$refereeId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
