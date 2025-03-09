<?php

namespace Sportmonks\Apis\Football;

use Sportmonks\Clients\SportmonksV3Client;

class FootballApiClient extends SportmonksV3Client
{
    public function __construct()
    {
        parent::__construct('https://api.sportmonks.com/v3/football/');
    }
}
