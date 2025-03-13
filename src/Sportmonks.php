<?php

namespace Sportmonks;

use Sportmonks\Apis\Core\CoreApi;
use Sportmonks\Apis\Football\FootballApi;

class Sportmonks
{
    public static function core(): CoreApi
    {
        return new CoreApi();
    }

    public static function football(): FootballApi
    {
        return new FootballApi();
    }
}
