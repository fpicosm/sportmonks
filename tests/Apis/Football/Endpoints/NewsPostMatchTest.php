<?php

namespace Apis\Football\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Apis\Football\Endpoints\News;
use Sportmonks\Sportmonks;
use TestCase;

class NewsPostMatchTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function get_post_match_news_test(): void
    {
        $response = Sportmonks::football()
            ->news()
            ->postMatch()
            ->all();

        $this->assertEquals('/v3/football/news/post-match', $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectHasProperty('pagination', $response);
        $this->assertSchemaEquals(News::fields, $response->data[0]);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_post_match_news_by_season_id_test(): void
    {
        $seasonId = 21638;

        $response = Sportmonks::football()
            ->news()
            ->postMatch()
            ->bySeason($seasonId);

        $this->assertEquals("/v3/football/news/post-match/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
        $this->assertNotEmpty($response->data);
        $this->assertContainsOnlyObject($response->data);
        $this->assertObjectNotHasProperty('pagination', $response);
    }
}
