<?php

namespace Sportmonks\Apis\Football\Endpoints;

class Odds
{
    public function inplay(): OddsInplay
    {
        return new OddsInplay();
    }

    public function preMatch(): OddsPreMatch
    {
        return new OddsPreMatch();
    }
}
