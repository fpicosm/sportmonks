<?php

namespace Sportmonks\Apis\Odds;

use Sportmonks\Apis\Odds\Endpoints\Bookmakers;
use Sportmonks\Apis\Odds\Endpoints\Markets;

class OddsApi
{
    public function bookmakers(): Bookmakers
    {
        return new Bookmakers();
    }

    public function markets(): Markets
    {
        return new Markets();
    }
}
