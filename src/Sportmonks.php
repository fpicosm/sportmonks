<?php

namespace Sportmonks;

use Sportmonks\Apis\Core\CoreApi;
use Sportmonks\Apis\Football\FootballApi;
use Sportmonks\Apis\My\MyApi;

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

    public static function my(): MyApi
    {
        return new MyApi();
    }
}
