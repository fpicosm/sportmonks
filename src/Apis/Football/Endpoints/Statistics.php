<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballApiClient;
use Sportmonks\Clients\ApiResponse;

class Statistics extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function byStage(int $stageId, $query = []): ApiResponse
    {
        return $this->call("statistics/stages/$stageId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byRound(int $roundId, $query = []): ApiResponse
    {
        return $this->call("statistics/rounds/$roundId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byPlayer(int $playerId, $query = []): ApiResponse
    {
        return $this->byParticipant("players", $playerId, $query);
    }
    
    /**
     * @throws GuzzleException
     */
    private function byParticipant(string $participant, int $participantId, mixed $query): ApiResponse
    {
        return $this->call("statistics/$participant/$participantId", $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byTeam(int $teamId, $query = []): ApiResponse
    {
        return $this->byParticipant("teams", $teamId, $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byCoach(int $coachId, $query = []): ApiResponse
    {
        return $this->byParticipant("coaches", $coachId, $query);
    }

    /**
     * @throws GuzzleException
     */
    public function byReferee(int $refereeId, $query = []): ApiResponse
    {
        return $this->byParticipant("referees", $refereeId, $query);
    }
}
