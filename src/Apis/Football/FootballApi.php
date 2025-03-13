<?php

namespace Sportmonks\Apis\Football;

use Sportmonks\Apis\Football\Endpoints\Fixtures;

class FootballApi
{
    public function fixtures(): Fixtures
    {
        return new Fixtures();
    }
}
