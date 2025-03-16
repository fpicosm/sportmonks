<?php

namespace Sportmonks\Apis\FormulaOne;

use Sportmonks\Apis\FormulaOne\Endpoints\Drivers;
use Sportmonks\Apis\FormulaOne\Endpoints\Livescores;
use Sportmonks\Apis\FormulaOne\Endpoints\Seasons;
use Sportmonks\Apis\FormulaOne\Endpoints\Stages;
use Sportmonks\Apis\FormulaOne\Endpoints\Teams;
use Sportmonks\Apis\FormulaOne\Endpoints\Tracks;

class FormulaOneApi
{
    public function livescores(): Livescores
    {
        return new Livescores();
    }

    public function seasons(): Seasons
    {
        return new Seasons();
    }

    public function tracks(): Tracks
    {
        return new Tracks();
    }

    public function stages(): Stages
    {
        return new Stages();
    }

    public function teams(): Teams
    {
        return new Teams();
    }

    public function drivers(): Drivers
    {
        return new Drivers();
    }
}
