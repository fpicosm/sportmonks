<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Apis\Football\Endpoints\News;
use Sportmonks\Sportmonks;
use TestCase;

class NewsPreMatchTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_pre_match_news_test(): void
    {
        $response = Sportmonks::football()
            ->news()
            ->preMatch()
            ->all();

        $this->assertEquals('/v3/football/news/pre-match', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
        $this->assertSchemaEquals(News::fields, $response->data[0]);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_pre_match_news_by_season_id_test(): void
    {
        $seasonId = 19734;

        $response = Sportmonks::football()
            ->news()
            ->preMatch()
            ->bySeason($seasonId);

        $this->assertEquals("/v3/football/news/pre-match/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_pre_match_news_for_upcoming_fixtures_test(): void
    {
        $response = Sportmonks::football()
            ->news()
            ->preMatch()
            ->upcoming();

        $this->assertEquals('/v3/football/news/pre-match/upcoming', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
    }
}
