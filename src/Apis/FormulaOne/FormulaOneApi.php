<?php

namespace Sportmonks\Apis\FormulaOne;

use Sportmonks\Apis\FormulaOne\Endpoints\Drivers;
use Sportmonks\Apis\FormulaOne\Endpoints\Livescores;
use Sportmonks\Apis\FormulaOne\Endpoints\Seasons;
use Sportmonks\Apis\FormulaOne\Endpoints\Stages;
use Sportmonks\Apis\FormulaOne\Endpoints\Teams;
use Sportmonks\Apis\FormulaOne\Endpoints\Tracks;
use Sportmonks\Apis\FormulaOne\Endpoints\Winners;

class FormulaOneApi
{
    public function drivers(): Drivers
    {
        return new Drivers();
    }

    public function livescores(): Livescores
    {
        return new Livescores();
    }

    public function seasons(): Seasons
    {
        return new Seasons();
    }

    public function stages(): Stages
    {
        return new Stages();
    }

    public function teams(): Teams
    {
        return new Teams();
    }

    public function tracks(): Tracks
    {
        return new Tracks();
    }

    public function winners(): Winners
    {
        return new Winners();
    }
}
