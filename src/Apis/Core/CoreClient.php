<?php

namespace Sportmonks\Apis\Core;

use Sportmonks\Clients\SportmonksV3Client;

class CoreClient extends SportmonksV3Client
{
    public function __construct()
    {
        parent::__construct('https://api.sportmonks.com/v3/core/');
    }
}
