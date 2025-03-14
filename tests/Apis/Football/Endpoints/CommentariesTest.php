<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class CommentariesTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_all_commentaries_test(): void
    {
        $response = Sportmonks::football()->commentaries()->all();
        $this->assertEquals('/v3/commentaries', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_commentaries_by_fixture_id_test(): void
    {
        $fixtureId = 18538011;
        $response = Sportmonks::football()->commentaries()->byFixture($fixtureId);
        $this->assertEquals("/v3/commentaries/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
