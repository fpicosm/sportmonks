<?php

namespace Sportmonks\Apis\Football;

use Sportmonks\Apis\Football\Endpoints\Coaches;
use Sportmonks\Apis\Football\Endpoints\Commentaries;
use Sportmonks\Apis\Football\Endpoints\Expected;
use Sportmonks\Apis\Football\Endpoints\Fixtures;
use Sportmonks\Apis\Football\Endpoints\Leagues;
use Sportmonks\Apis\Football\Endpoints\Livescores;
use Sportmonks\Apis\Football\Endpoints\News;
use Sportmonks\Apis\Football\Endpoints\Players;
use Sportmonks\Apis\Football\Endpoints\Predictions;
use Sportmonks\Apis\Football\Endpoints\Referees;
use Sportmonks\Apis\Football\Endpoints\Rivals;
use Sportmonks\Apis\Football\Endpoints\Rounds;
use Sportmonks\Apis\Football\Endpoints\Schedules;
use Sportmonks\Apis\Football\Endpoints\Seasons;
use Sportmonks\Apis\Football\Endpoints\Squads;
use Sportmonks\Apis\Football\Endpoints\Stages;
use Sportmonks\Apis\Football\Endpoints\Standings;
use Sportmonks\Apis\Football\Endpoints\States;
use Sportmonks\Apis\Football\Endpoints\Statistics;
use Sportmonks\Apis\Football\Endpoints\Teams;
use Sportmonks\Apis\Football\Endpoints\TopScorers;
use Sportmonks\Apis\Football\Endpoints\Transfers;
use Sportmonks\Apis\Football\Endpoints\TvStations;
use Sportmonks\Apis\Football\Endpoints\Venues;

class FootballApi
{
    public function livescores(): Livescores
    {
        return new Livescores();
    }

    public function fixtures(): Fixtures
    {
        return new Fixtures();
    }

    public function states(): States
    {
        return new States();
    }

    public function leagues(): Leagues
    {
        return new Leagues();
    }

    public function seasons(): Seasons
    {
        return new Seasons();
    }

    public function statistics(): Statistics
    {
        return new Statistics();
    }

    public function schedules(): Schedules
    {
        return new Schedules();
    }

    public function stages(): Stages
    {
        return new Stages();
    }

    public function rounds(): Rounds
    {
        return new Rounds();
    }

    public function standings(): Standings
    {
        return new Standings();
    }

    public function topScorers(): TopScorers
    {
        return new TopScorers();
    }

    public function teams(): Teams
    {
        return new Teams();
    }

    public function players(): Players
    {
        return new Players();
    }

    public function squads(): Squads
    {
        return new Squads();
    }

    public function coaches(): Coaches
    {
        return new Coaches();
    }

    public function referees(): Referees
    {
        return new Referees();
    }

    public function transfers(): Transfers
    {
        return new Transfers();
    }

    public function venues(): Venues
    {
        return new Venues();
    }

    public function tvStations(): TvStations
    {
        return new TvStations();
    }

    public function expected(): Expected
    {
        return new Expected();
    }

    public function predictions(): Predictions
    {
        return new Predictions();
    }

    public function news(): News
    {
        return new News();
    }

    public function rivals(): Rivals
    {
        return new Rivals();
    }

    public function commentaries(): Commentaries
    {
        return new Commentaries();
    }
}
