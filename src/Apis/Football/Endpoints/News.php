<?php

namespace Sportmonks\Apis\Football\Endpoints;

class News
{
    const array fields = [
        'id',
        'fixture_id',
        'league_id',
        'title',
        'type',
    ];

    public function preMatch(): NewsPreMatch
    {
        return new NewsPreMatch();
    }

    public function postMatch(): NewsPostMatch
    {
        return new NewsPostMatch();
    }
}
