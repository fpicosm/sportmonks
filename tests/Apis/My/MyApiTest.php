<?php

namespace Apis\My;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class MyApiTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_my_enrichments_test()
    {
        $response = Sportmonks::my()->enrichments();

        $this->assertEquals('/v3/my/enrichments', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertContainsOnlyObject($response->data);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_my_resources_test()
    {
        $response = Sportmonks::my()->resources();

        $this->assertEquals('/v3/my/resources', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertContainsOnlyObject($response->data);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_my_leagues_test()
    {
        $response = Sportmonks::my()->leagues();

        $this->assertEquals('/v3/my/leagues', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertContainsOnlyObject($response->data);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_my_usage_test()
    {
        $response = Sportmonks::my()->usage();
        
        $this->assertEquals('/v3/my/usage', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertContainsOnlyObject($response->data);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_my_filters_by_entity_test()
    {
        $response = Sportmonks::my()->filters();

        $this->assertEquals('/v3/my/filters/entity', $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertObjectHasProperty('coachstatistic', $response->data);
        $this->assertIsArray($response->data->coachstatistic);
        $this->assertIsString($response->data->coachstatistic[0]);
    }
}
