<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Apis\Football\Endpoints\Coaches;
use Sportmonks\Sportmonks;
use TestCase;

class CoachesTest extends TestCase
{


    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_coaches_test(): void
    {
        $response = Sportmonks::football()
            ->coaches()
            ->all();

        $this->assertEquals('/v3/football/coaches', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_coach_by_id_test(): void
    {
        $coachId = 452946;

        $response = Sportmonks::football()
            ->coaches()
            ->find($coachId);

        $this->assertEquals("/v3/football/coaches/$coachId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertEquals('Diego Pablo Simeone', $response->data->name);
        $this->assertObjectNotHasProperty('pagination', $response);
        $this->assertSchemaEquals(Coaches::fields, $response->data);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_coaches_by_country_id_test(): void
    {
        $countryId = 320;

        $response = Sportmonks::football()
            ->coaches()
            ->byCountry($countryId);

        $this->assertEquals("/v3/football/coaches/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function search_coaches_by_name_test(): void
    {
        $name = 'simeone';

        $response = Sportmonks::football()
            ->coaches()
            ->search($name);

        $this->assertEquals("/v3/football/coaches/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
        $this->assertStringContainsStringIgnoringCase($name, $response->data[0]->name);

        $name = 'D. Simeone';

        $response = Sportmonks::football()
            ->coaches()
            ->search($name);

        $this->assertEquals(200, $response->statusCode);
        $this->assertNotEmpty($response->data);
        $this->assertStringContainsStringIgnoringCase($name, $response->data[0]->common_name);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_last_updated_coaches_test(): void
    {
        $response = Sportmonks::football()
            ->coaches()
            ->lastUpdated();

        $this->assertEquals('/v3/football/coaches/latest', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
