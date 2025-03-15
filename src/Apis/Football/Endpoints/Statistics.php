<?php

namespace Sportmonks\Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\Apis\Football\FootballClient;

class Statistics extends FootballClient
{
    /**
     * @param int $stageId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byStage(int $stageId, array $query = []): object
    {
        return $this->getArray("statistics/stages/$stageId", $query);
    }

    /**
     * @param int $roundId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byRound(int $roundId, array $query = []): object
    {
        return $this->getArray("statistics/rounds/$roundId", $query);
    }

    /**
     * @param int $playerId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byPlayer(int $playerId, array $query = []): object
    {
        return $this->byParticipant("players", $playerId, $query);
    }

    /**
     * @param string $participant
     * @param int $participantId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    private function byParticipant(string $participant, int $participantId, array $query = []): object
    {
        return $this->getArray("statistics/seasons/$participant/$participantId", $query);
    }

    /**
     * @param int $teamId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byTeam(int $teamId, array $query = []): object
    {
        return $this->byParticipant("teams", $teamId, $query);
    }

    /**
     * @param int $coachId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byCoach(int $coachId, array $query = []): object
    {
        return $this->byParticipant("coaches", $coachId, $query);
    }

    /**
     * @param int $refereeId
     * @param array $query
     * @return object
     * @throws GuzzleException
     */
    public function byReferee(int $refereeId, array $query = []): object
    {
        return $this->byParticipant("referees", $refereeId, $query);
    }
}
