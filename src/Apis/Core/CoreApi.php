<?php

namespace Sportmonks\Apis\Core;

use Sportmonks\Apis\Core\Endpoints\Continents;

class CoreApi
{
    public function continents(): Continents
    {
        return new Continents();
    }
}
