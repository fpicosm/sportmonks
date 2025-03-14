<?php

namespace Apis\Core\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class TypesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_types_test(): void
    {
        $response = Sportmonks::core()->types()->all();
        $this->assertEquals('/v3/core/types', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_type_by_id_test(): void
    {
        $typeId = 1;
        $response = Sportmonks::core()->types()->find($typeId);
        $this->assertEquals("/v3/core/types/$typeId", $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_types_by_entity_test(): void
    {
        $response = Sportmonks::core()->types()->byEntities();
        $this->assertEquals('/v3/core/types/entities', $response->url->getPath());
        $this->assertIsObject($response->data);
        $this->assertObjectHasProperty('CoachStatisticDetail', $response->data);
        $this->assertIsObject($response->data->CoachStatisticDetail);
        $this->assertObjectHasProperty('types', $response->data->CoachStatisticDetail);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
