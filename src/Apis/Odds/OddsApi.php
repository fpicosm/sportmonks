<?php

namespace Sportmonks\Apis\Odds;

use Sportmonks\Apis\Odds\Endpoints\Markets;

class OddsApi
{
    public function markets(): Markets
    {
        return new Markets();
    }
}
