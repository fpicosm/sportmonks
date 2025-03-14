<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class StatesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_states_test()
    {
        $response = Sportmonks::football()->states()->all();
        $this->assertEquals('/v3/football/states', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_state_by_id_test()
    {
        $stateId = 1;
        $response = Sportmonks::football()->states()->find($stateId);
        $this->assertEquals("/v3/football/states/$stateId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertEquals('Not Started', $response->data->name);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
