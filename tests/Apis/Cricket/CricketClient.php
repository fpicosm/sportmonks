<?php

namespace Apis\Cricket;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class CricketClient extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function set_include_option_test(): void
    {
        $response = Sportmonks::cricket()
            ->leagues()
            ->all();

        $this->assertEquals('/api/v2.0/leagues', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('country', $response->data[0]);
        $this->assertObjectNotHasProperty('seasons', $response->data[0]);

        $response = Sportmonks::cricket()
            ->leagues()
            ->setInclude('seasons', 'country')
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('country', $response->data[0]);
        $this->assertIsObject($response->data[0]->country);
        $this->assertObjectHasProperty('seasons', $response->data[0]);
        $this->assertIsArray($response->data[0]->seasons);

        // Could be an array too
        $response = Sportmonks::cricket()
            ->leagues()
            ->setInclude(['seasons', 'country'])
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('country', $response->data[0]);
        $this->assertObjectHasProperty('seasons', $response->data[0]);

        // Could be a comma separated string
        $response = Sportmonks::cricket()
            ->leagues()
            ->setInclude('seasons,country')
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('country', $response->data[0]);
        $this->assertObjectHasProperty('seasons', $response->data[0]);

        $this->expectExceptionCode(400);
        // Should be a comma separated string
        Sportmonks::cricket()
            ->leagues()
            ->setInclude('seasons;country')
            ->all();
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function set_fields_option_test(): void
    {
        $response = Sportmonks::cricket()
            ->countries()
            ->all();

        $this->assertEquals('/api/v2.0/countries', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('image_path', $response->data[0]);

        $response = Sportmonks::cricket()
            ->countries()
            ->setFields('name')
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectNotHasProperty('image_path', $response->data[0]);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function set_filters_option_test(): void
    {
        $response = Sportmonks::cricket()
            ->countries()
            ->all();

        $this->assertEquals('/api/v2.0/countries', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertGreaterThan(1, $response->data);

        $response = Sportmonks::cricket()
            ->countries()
            ->setFilters(['continent_id' => 1, 'name' => 'Poland'])
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertIsArray($response->data);
        $this->assertCount(1, $response->data);

        $response = Sportmonks::cricket()
            ->countries()
            ->setFilters(['continent_id' => 2, 'name' => 'Poland'])
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertIsArray($response->data);
        $this->assertCount(0, $response->data);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function set_sort_option_test(): void
    {
        $response = Sportmonks::cricket()
            ->countries()
            ->sortBy('name')
            ->all();

        $this->assertEquals('/api/v2.0/countries', $response->url->getPath());
        $this->assertEquals('name', $this->getQuery($response, 'sort'));
        $this->assertEquals('Afghanistan', $response->data[0]->name);

        $response = Sportmonks::cricket()
            ->countries()
            ->sortBy('continent_id', 'name')
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertEquals('Albania', $response->data[0]->name);
    }
}
