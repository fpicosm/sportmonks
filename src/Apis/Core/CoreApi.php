<?php

namespace Sportmonks\Apis\Core;

use Sportmonks\Apis\Core\Endpoints\Cities;
use Sportmonks\Apis\Core\Endpoints\Continents;
use Sportmonks\Apis\Core\Endpoints\Countries;
use Sportmonks\Apis\Core\Endpoints\Regions;
use Sportmonks\Apis\Core\Endpoints\Timezones;
use Sportmonks\Apis\Core\Endpoints\Types;

class CoreApi
{
    public function continents(): Continents
    {
        return new Continents();
    }

    public function countries(): Countries
    {
        return new Countries();
    }

    public function regions(): Regions
    {
        return new Regions();
    }

    public function cities(): Cities
    {
        return new Cities();
    }

    public function types(): Types
    {
        return new Types();
    }

    public function timezones(): Timezones
    {
        return new Timezones();
    }
}
