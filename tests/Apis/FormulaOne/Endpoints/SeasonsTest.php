<?php

namespace Apis\FormulaOne\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class SeasonsTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_seasons_test(): void
    {
        $this->expectExceptionCode(403);
        Sportmonks::f1()->seasons()->all();
    }
}
