<?php

namespace Sportmonks\Apis\Odds;

use Sportmonks\Clients\SportmonksV3Client;

class OddsClient extends SportmonksV3Client
{
    public function __construct()
    {
        parent::__construct('https://api.sportmonks.com/v3/odds/');
    }
}
