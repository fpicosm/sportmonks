<?php

namespace Clients;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;
use Sportmonks\Sportmonks;
use TestCase;

class SportmonksV3Client extends TestCase
{
    /**
     * @throws GuzzleException
     */
    #[Test] public function set_select_option_test()
    {
        $countryId = 32;

        $response = Sportmonks::core()
            ->countries()
            ->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertIsObject($response->data);
        $this->assertObjectHasProperty('name', $response->data);
        $this->assertObjectHasProperty('fifa_name', $response->data);
        $this->assertObjectHasProperty('iso2', $response->data);

        $response = Sportmonks::core()
            ->countries()
            ->setSelect('name')
            ->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('name', $response->data);
        $this->assertObjectNotHasProperty('fifa_name', $response->data);
        $this->assertObjectNotHasProperty('iso2', $response->data);

        $response = Sportmonks::core()
            ->countries()
            ->setSelect('name', 'fifa_name')
            ->find($countryId);

        $this->assertObjectHasProperty('name', $response->data);
        $this->assertObjectHasProperty('fifa_name', $response->data);
        $this->assertObjectNotHasProperty('iso2', $response->data);

        // could be a comma separated string
        $response = Sportmonks::core()
            ->countries()
            ->setSelect('name,fifa_name')
            ->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('name', $response->data);
        $this->assertObjectHasProperty('fifa_name', $response->data);
        $this->assertObjectNotHasProperty('iso2', $response->data);

        $response = Sportmonks::core()
            ->countries()
            ->setSelect('name, fifa_name')
            ->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('name', $response->data);
        $this->assertObjectHasProperty('fifa_name', $response->data);
        $this->assertObjectNotHasProperty('iso2', $response->data);

        // could be an array too
        $response = Sportmonks::core()
            ->countries()
            ->setSelect(['name', 'fifa_name'])
            ->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('name', $response->data);
        $this->assertObjectHasProperty('fifa_name', $response->data);
        $this->assertObjectNotHasProperty('iso2', $response->data);

        // could not be a semicolon separated string
        $this->expectExceptionCode(400);
        Sportmonks::core()
            ->countries()
            ->setSelect('name;fifa_name')
            ->find($countryId);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function set_include_option_test()
    {
        $countryId = 32;
        $response = Sportmonks::core()->countries()->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertIsObject($response->data);
        $this->assertObjectNotHasProperty('continent', $response->data);
        $this->assertObjectNotHasProperty('leagues', $response->data);

        $response = Sportmonks::core()
            ->countries()
            ->setInclude('continent')
            ->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('continent', $response->data);
        $this->assertObjectNotHasProperty('leagues', $response->data);

        $response = Sportmonks::core()
            ->countries()
            ->setInclude('continent', 'leagues')
            ->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('continent', $response->data);
        $this->assertObjectHasProperty('leagues', $response->data);

        // could be a semicolon separated string
        $response = Sportmonks::core()
            ->countries()
            ->setInclude('continent;leagues')
            ->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('continent', $response->data);
        $this->assertObjectHasProperty('leagues', $response->data);

        $response = Sportmonks::core()
            ->countries()
            ->setInclude('continent; leagues')
            ->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('continent', $response->data);
        $this->assertObjectHasProperty('leagues', $response->data);

        // could be an array too
        $response = Sportmonks::core()
            ->countries()
            ->setInclude(['continent', 'leagues'])
            ->find($countryId);

        $this->assertEquals(200, $response->statusCode);
        $this->assertObjectHasProperty('continent', $response->data);
        $this->assertObjectHasProperty('leagues', $response->data);

        // could not be a comma separated string
        $this->expectExceptionCode(404);
        Sportmonks::core()
            ->countries()
            ->setInclude('continent,leagues')
            ->find($countryId);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function get_page_option_test()
    {
        $response = Sportmonks::core()
            ->countries()
            ->getPage(2)
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertIsArray($response->data);
        $this->assertObjectHasProperty('pagination', $response);

        // by default, 50 items per page
        $this->assertEquals(2, $response->pagination->current_page);
        $this->assertEquals(50, $response->pagination->per_page);

        $response = Sportmonks::core()
            ->countries()
            ->getPage(2, 10)
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertEquals(2, $response->pagination->current_page);
        $this->assertEquals(10, $response->pagination->per_page);
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function sort_by_option_test()
    {
        // 'asc' by default
        $response = Sportmonks::core()
            ->countries()
            ->sortBy('name')
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertEquals('name', $this->getQuery($response, 'sortBy'));
        $this->assertEquals('asc', $this->getQuery($response, 'order'));

        // could be 'desc' too
        $response = Sportmonks::core()
            ->countries()
            ->sortBy('name', 'desc')
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertEquals('desc', $this->getQuery($response, 'order'));

        // throws an exception with other value
        $this->expectException(InvalidArgumentException::class);
        Sportmonks::core()
            ->countries()
            ->sortBy('name', 'other')
            ->all();
    }

    /**
     * @throws GuzzleException
     */
    #[Test] public function set_filters_option_test()
    {
        $response = Sportmonks::football()->leagues()->all();
        $this->assertEquals(200, $response->statusCode);

        $leagueCount = count($response->data);
        $firstId = $response->data[0]->id;

        // Static filters
        $response = Sportmonks::football()
            ->leagues()
            ->setFilters(['idAfter' => $firstId])
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertLessThan($leagueCount, count($response->data));

        // Dynamic filters
        $countryId = 32;

        $response = Sportmonks::football()
            ->leagues()
            ->setInclude('country')
            ->setFilters(['leagueCountries' => $countryId])
            ->all();

        $this->assertEquals(200, $response->statusCode);
        $this->assertLessThan($leagueCount, count($response->data));
        foreach ($response->data as $league) {
            $this->assertEquals($countryId, $league->country_id);
        }

        // Filter without value
        $response = Sportmonks::football()
            ->fixtures()
            ->setInclude('state')
            ->setFilters(['Deleted'])
            ->all();

        $this->assertEquals(200, $response->statusCode);
        foreach ($response->data as $fixture) {
            $this->assertEquals('Deleted', $fixture->state->name);
        }

        // Both with and without values
        $response = Sportmonks::football()
            ->fixtures()
            ->setFilters([
                'fixtureLeagues' => [564, 8],
                'todayDate',
            ])
            ->all();
        $this->assertEquals(200, $response->statusCode);
    }
}
