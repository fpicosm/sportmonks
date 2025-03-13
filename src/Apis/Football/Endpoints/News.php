<?php

namespace Sportmonks\Apis\Football\Endpoints;

class News
{
    public function preMatch(): NewsPreMatch
    {
        return new NewsPreMatch();
    }

    public function postMatch(): NewsPostMatch
    {
        return new NewsPostMatch();
    }
}
