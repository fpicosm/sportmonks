<?php

namespace Sportmonks\Apis\Cricket;

use Sportmonks\Apis\Cricket\Endpoints\Continents;
use Sportmonks\Apis\Cricket\Endpoints\Countries;
use Sportmonks\Apis\Cricket\Endpoints\Fixtures;
use Sportmonks\Apis\Cricket\Endpoints\Leagues;
use Sportmonks\Apis\Cricket\Endpoints\Livescores;
use Sportmonks\Apis\Cricket\Endpoints\Officials;
use Sportmonks\Apis\Cricket\Endpoints\Players;
use Sportmonks\Apis\Cricket\Endpoints\Positions;
use Sportmonks\Apis\Cricket\Endpoints\Scores;
use Sportmonks\Apis\Cricket\Endpoints\Seasons;
use Sportmonks\Apis\Cricket\Endpoints\Stages;
use Sportmonks\Apis\Cricket\Endpoints\Standings;
use Sportmonks\Apis\Cricket\Endpoints\TeamRankings;
use Sportmonks\Apis\Cricket\Endpoints\Teams;
use Sportmonks\Apis\Cricket\Endpoints\Venues;

class CricketApi
{
    public function continents(): Continents
    {
        return new Continents();
    }

    public function countries(): Countries
    {
        return new Countries();
    }

    public function fixtures(): Fixtures
    {
        return new Fixtures();
    }

    public function leagues(): Leagues
    {
        return new Leagues();
    }

    public function livescores(): Livescores
    {
        return new Livescores();
    }

    public function officials(): Officials
    {
        return new Officials();
    }

    public function players(): Players
    {
        return new Players();
    }

    public function positions(): Positions
    {
        return new Positions();
    }

    public function scores(): Scores
    {
        return new Scores();
    }

    public function seasons(): Seasons
    {
        return new Seasons();
    }

    public function stages(): Stages
    {
        return new Stages();
    }

    public function standings(): Standings
    {
        return new Standings();
    }

    public function teamRankings(): TeamRankings
    {
        return new TeamRankings();
    }

    public function teams(): Teams
    {
        return new Teams();
    }

    public function venues(): Venues
    {
        return new Venues();
    }
}
